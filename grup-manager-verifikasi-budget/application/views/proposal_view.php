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
								<!-- <a class="btn btn-sm btn-outline-secondary" href="/ci/Barang/create">Tambah proposal</a> -->
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
									<th v-on:click="sortBy = 'id'">Nama Pengaju</th>											
									<th v-on:click="sortBy = 'id'">Budget</th>	
									<th v-on:click="sortBy = 'id'">Tanggal masuk</th>
									<th v-on:click="sortBy = 'id'">Tanggal deadline</th>
									<th v-on:click="sortBy = 'id'">Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody v-if="listTable.length>0">
								<tr v-for="(o, i) in listTable">
									<template v-if="o.managerid == null">
										<td>{{o.idproposal}}</td>
										<td>{{o.nama}}</td>
										<td>{{o.budget}}</td>
										<td>{{o.created}}</td>
										<td>{{o.deadline}}</td>
										<template v-if="o.status == 0">
											<td>Belum dikonfirmasi</td>
										</template>
										<template v-else-if="o.status == 1">
											<td>Sudah diAccept</td>
										</template>
										<template v-else-if="o.status == 2">
											<td>Sudah Sampai</td>
										</template>
										<template v-else-if="o.status == -1">
											<td>Direject</td>
										</template>
										<td>	
											<button class="btn btn-sm btn-primary"
													v-on:click="detail(i)">
												Detail
											</button>
										</td>
									</template>
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
									<label>Barang Id: {{proposal.idproposal}}</label>
								</div>
								<textbox label="Nama Pengaju"											
										v-model="proposal.nama"
										readonly>
								</textbox>
								<textbox label="Email Pengaju"											
										v-model="proposal.email"
										readonly>
								</textbox>
								<textbox label="Budget Request"											
											v-model="proposal.budget"
											readonly>
								</textbox>									 
								<textbox label="Tanggal Masuk"											
											v-model="proposal.created"
											readonly>
								</textbox>
								<textbox label="Tanggal deadline"											
											v-model="proposal.deadline"
											readonly>
								</textbox>
								<table class="table table-striped table-sm">
									<thead>
										<tr>
											<th v-on:click="sortBy = 'id'">Nama Barang</th>											
											<th v-on:click="sortBy = 'id'">Kode Barang</th>	
											<th v-on:click="sortBy = 'id'">Harga</th>
											<th v-on:click="sortBy = 'id'">Qty</th>
										</tr>
									</thead>
									<tbody v-if="proposal.barangList.length>0">
										<tr v-for="(o, i) in proposal.barangList">
											<td>{{o.nama}}</td>
											<td>{{o.kodebarang}}</td>
											<td>{{o.harga}}</td>
											<td>{{o.qty}}</td>
										</tr>
									</tbody>
								</table>
								<input type="checkbox" v-model="showRaw"  />
								<label>Tampilkan pesan <i>raw</i></label>								
								<pre v-if="showRaw">{{proposal}}</pre>											   							  
							</div>
							<div slot="footer" v-if="proposal.status == 0">
								<a class="btn btn-danger" v-bind:href="'/ci/proposal/reject/' + id " style="color:white">
									Reject
								</a>
								<a class="btn btn-primary" v-bind:href="'/ci/proposal/accept/' + id " style="color:white">
									Accept
								</a>
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

	var 
		g_tabTransactionsList = new Vue(
			{
				el: "#tab",
				data:
				{
					page: 0,
					loadingMsg: "<?php  print($this->session->flashdata('message')) ?>",

					originalTable: new Array(),
					listTable: new Array(),
					proposal : new Object(),
					searchTable: "",			
					detailModal : false,
					maxList: 50,

					pageButtons: new Array(),
					searchFound: false,
					tablePage: 0,
					maxNo: 50,

					id:-1,

					showRaw: false
				},
				created: function()
				{
					this.loadList();
					setTimeout(function(){ g_tabTransactionsList.loadingMsg = "" }, 1000);
				},
				methods:
				{
					detail: function(id)
					{						
						var d = this.originalTable[id];
						this.proposal = d;
						this.detailModal = true;
						this.id = d.idproposal;
					},
					loadList: function()
					{
						var
							data =`
							<?php
								print(json_encode($proposal_data));
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
