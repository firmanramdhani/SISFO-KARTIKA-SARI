<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/vue-clickaway@^2.1.0/dist/vue-clickaway.js"></script>
	
	<link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="/ci/resource/page.css" rel="stylesheet" />
	<link href="/ci/resource/popup.css" rel="stylesheet" />
</head>
<body>
<div id="tab">
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Kartika Sari</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="/ci/login/logout">Sign out</a>
			</li>
		</ul>
	</nav>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" style="margin-top:40px;">
		<menu-bar>
			<template slot="additionalDropdownMenu">
				
			</template>
		</menu-bar>
	</nav>
	<div id="content" style="margin-top:100px;">
		<div class="container-fluid" style="margin-top:50px;">
			<div class="row">
				<nav id="sidebar" class="col-md-2 d-none d-md-block bg-light sidebar" >
					<sidebar></sidebar>
				</nav>
		
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h3 class="h2">Daftar Proposal Barang</h3>
						<div class="btn-toolbar mb-2 mb-md-0">
							<div class="btn-group mr-2">
								<!-- <a class="btn btn-sm btn-outline-secondary" href="/ci/Barang/create">Tambah barang</a> -->
							</div>
						</div>
					</div>	
					<prompt v-if="loadingMsg != ''">
						{{loadingMsg}}
					</prompt>				
					<div>
						<div class="float-left">
							<input  type="text" 
									placeholder="cari nama konsumen..." 
									v-model="searchTable"
									oninput="g_tabTransactionsList.search(g_tabTransactionsList.searchTable);" />
						</div>

						<div class="float-right"
							 v-if="!searchFound">
							<label>Jumlah data yang dipull dari server</label>
							<input type="number" 
									min="50" 
									value="50"
									v-model="maxList" />
							<button class="btn btn-sm btn-primary"
									v-on:click="loadList()">
								Refresh!
							</button>
						</div>
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th v-on:click="sortBy = 'id'">Id</th>
									<th v-on:click="sortBy = 'id'">Kode</th>											
									<th v-on:click="sortBy = 'id'">Nama barang</th>	
									<th v-on:click="sortBy = 'id'">Qty</th>
									<th v-on:click="sortBy = 'id'">Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody v-if="listTable.length>0">
								<tr v-for="(o, i) in listTable">
									<td>{{o.idbarang}}</td>
									<td>{{o.kodebarang}}</td>
									<td>{{o.namabarang}}</td>
									<td>{{o.qty}}</td>
									<td>{{o.harga}}</td>
									<td>	
										<button class="btn btn-sm btn-primary"
												v-on:click="detail(i)">
											Detail
										</button>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="float-right"
						v-if="!searchFound">
					   <span>Halaman:</span>
					   <div style="max-width: 300px;overflow-x: auto;white-space: nowrap;">
							<template v-for="b of pageButtons" >
									<button v-if="tablePage == b"
										v-on:click="goToPage(b)"
										class="btn btn-sm btn-primary" 
										style="margin:5px;">
								{{b+1}}
								</button>
								<button v-else
										v-on:click="goToPage(b)"
										class="btn btn-sm btn-default" 
										style="margin:5px;">
								{{b+1}}
								</button>
							</template>
						</div>
						<modal v-if="detailModal" v-on:close="detailModal = false">
							<h3 slot="header">Detail Barang</h3>
							<div slot="body">
								<div class="float-left">
									<label>Barang Id: {{barang.idbarang}}</label>
								</div>
								<textbox label="Nama Barang"											
										v-model="barang.namabarang"
										readonly>
								</textbox>	
								<textbox label="Kode"											
											v-model="barang.kodebarang"
											readonly>
								</textbox>
								<textbox label="harga"											
											v-model="barang.harga"
											readonly>
								</textbox>									 
								<textbox label="Qty"											
											v-model="barang.qty"
											readonly>
								</textbox>
								<input type="checkbox" v-model="showRaw"  />
								<label>Tampilkan pesan <i>raw</i></label>
								<button>
									Reject
								</button>
								<button>
									Accept
								</button>
								<pre v-if="showRaw">{{barang}}</pre>											   							  
							</div>
						</modal>
					</div>
				</main>
			</div>
		</div>
	</div>	  
</div>

</body>
<script src="/ci/resource/vueComponent.js" ></script>
<script>
	const 
		GETLIST_URL = 
		Object.freeze({
			url: "/api/index.php/Orders/GetTransactionList",
			operation: "GET"
		}),
		DOWNLOADFILE_URL = 
		Object.freeze({
			url: "/api/index.php/Orders/DownloadCsv",
			operation: "GET"
		}),
		GETDETAILTRANSACTION_URL = 
		Object.freeze({
			url: "/api/index.php/Orders/GetDetailed2",
			operation: "GET"
		});

	var 
		g_tabTransactionsList = new Vue(
			{
				el: "#tab",
				data:
				{
					page: 0,
					loadingMsg: "",

					originalTable: new Array(),
					listTable: new Array(),
					barang : new Object(),
					searchTable: "",			
					detailModal : false,
					maxList: 50,

					pageButtons: new Array(),
					searchFound: false,
					tablePage: 0,
					maxNo: 50,

					showRaw: false
				},
				created: function()
				{
					this.loadList();
				},
				methods:
				{
					detail: function(id)
					{						
						var d = this.originalTable[id];
						this.barang = d;
						this.detailModal = true;

					},
					loadList: function()
					{
						var
							data =`
							<?php
								print(json_encode($barang_data));
							?>`;

						this.originalTable = new Array();

						this.originalTable = JSON.parse(data);
						this.initPagination();
						this.goToPage(0);				
						
					},
					search: function(text)
					{
						var 
							found = new Array();
						
						if(text.length > 1)
						{
							found = this.originalTable.filter(
							function (el) 
							{
								return (new RegExp(text, "i")).test(el.name); 
							});
							this.listTable = found;
							this.searchFound = true;
						}
						else
						{
							this.initPagination();
							this.goToPage(0);
							this.searchFound = false;
						}
							
					},
					initPagination: function()
					{
						var
							pageButtons = new Set();
							
						this.pageButtons = new Array();
						
						for (var i = 0; i< this.originalTable.length; i++) 
						{						
							pageButtons.add(Math.floor(i / this.maxNo));
						}
						this.pageButtons = Array.from(pageButtons);
					},
					goToPage: function(index)
					{
						this.tablePage = index;
						this.listTable = new Array();
						for(var i=index*this.maxNo; i< this.originalTable.length; i++)
						{
							if(this.listTable.length < this.maxNo)
								this.listTable.push(this.originalTable[i]);
						}

					}
				}
			}
		);
</script>
<script src="/ci/resource/vueProgram.js"></script>
</html>
