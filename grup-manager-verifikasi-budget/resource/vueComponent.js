
Vue.component('menu-list',
{
	data: function ()
	{
		return {
			count: 0
		};
	},
	props:
	{
		label: String,
		action: String,
		secondaryLabel: Boolean
	},
	methods:
	{
		test: function (a) {

		}
	},
	template:
`
	<li v-if="secondaryLabel" 
		class="nav-item">
		<a class="nav-link active"
			v-bind:href="action">
			<span data-feather="home"></span>
			{{label}}
		</a>
	</li>              
	<li v-else class="nav-item">
		<a class="nav-link active" 
		   v-bind:href="action">
			<span data-feather="file-text"></span>
			{{label}}
		</a>
	</li>               
`
});

Vue.component("textbox",
{
	props:
	{
		label:
		{
			type: String,
			required: true
		},
		name: String,
		id: String,
		value: String,
		readonly: Boolean,
		password: Boolean
	},
	template:
`
<div class="input-group input-group-sm mb-3">
	<div class="input-group-prepend">
		<span class="input-group-text" 
			style="min-width:200px">
			{{label}}
		</span>
	</div>
	<input v-bind:id="id" 
			
			v-bind:readonly="readonly"
			v-bind:type="password ? 'password' : 'text' " 
			class="form-control" 
			aria-label="Small" 
			aria-describedby="inputGroup-sizing-sm"
			v-bind:name="name"
			
			v-bind:value="value"
			v-on:input="$emit('input', $event.target.value);" />
</div>
`
});

Vue.component("dropdown",
{
	data: function()
	{
		return {
			value: ""
		}
	},
	props:
	{
		label:
		{
			type:String,
			required: true
		},
		list: 
		{
			type: Array,
			required: true
		},
		id: String,
		readonly: Boolean,
		value: String
	},
	computed:
	{
		selected:
		{
			get: function()  {return this.value     },
			set: function(v) {this.$emit('input', v)}
		}
	},
	template:
`
<div class="input-group input-group-sm mb-3">
	<div class="input-group-prepend">
			<span class="input-group-text" 
				style="min-width:200px">
				{{label}}
			</span>
		</div>				
	<select class="form-control"
				  v-model="selected">
		<option disabled value="">Klik untuk Pilih</option>
		<option v-for="l of list" v-bind:value="l">{{l}}</option>
	</select>
</div>
`
});

Vue.component("dropdown-object",
{
	data: function()
	{
		return {
			value: ""
		}
	},
	props:
	{
		label:
		{
			type:String,
			required: true
		},
		list: 
		{
			type: Array,
			required: true
		},
		id: String,
		readonly: Boolean,
		value: String
	},
	computed:
	{
		selected:
		{
			get: function()  {return this.value     },
			set: function(v) {this.$emit('input', v)}
		}
	},
	template:
`
<div class="input-group input-group-sm mb-3">
	<div class="input-group-prepend">
			<span class="input-group-text" 
				style="min-width:200px">
				{{label}}
			</span>
		</div>				
	<select class="form-control"
				  v-model="selected">
		<option disabled value="">Klik untuk Pilih</option>
		<option v-for="l of list" v-bind:value="l.id">{{l.name}}</option>
	</select>
</div>
`
});

Vue.component("btn-small",
{
	props:
	{
		onclick: String,
		id: String,
		classStyle : String
	},
	template:
`
<button class="btn btn-sm btn-primary" 
		v-bind:onclick="onclick" 
		v-bind:id="id" 
		v-bind:class="classStyle">
	<slot></slot>
</button>
`
});


Vue.component("thumb-pick-check",
	{
		data: function () {
			return {
				values: 
				{
					qty: 1, 
					checked:false,
					itemId: this.itemId,
					title: this.title,
					picture: this.picSrc
				} 
			};
		},
		props:
		{
			value: [String, Array, Object],
			id: String,
			itemId: [String, Number],
			picSrc:
			{
				type: String,
				required: true
			},
			picAlt: String,
			title:
			{
				type: String,
				required: true
			},
			descriptions:
			{
				type: String,
				
			},
			callbackFn: String,
			disabled: Boolean,

			harga: [Number, String]
		},
		methods:
		{
			updateValue: function ()
			{
				this.$emit("input", this.values);
			}
		},
		template:
			`
<div class="col-md-3 valore-picker">
	<div class="card">
		<img class="card-img-top"
				v-bind:src="picSrc"
				v-bind:alt="picAlt" />
		<div class="card-body">
			<h5 class="card-title">
				{{title}}
			</h5>
			<p class="card-text">
				{{descriptions}}
				<br/>
				<b>Harga: {{harga}}</b>
			</p>
			<label> Pilih </label>
			<input type="checkbox"
				v-bind:id="id"
				v-bind:disabled="disabled"

				v-model="values.checked"
				v-on:change="updateValue"
			/>
			<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" 
					style="min-width:20px">
						Qty
					</span>
				</div>
				<input v-bind:disabled="!values.checked" 
					  
						v-model="values.qty"
						v-on:change="updateValue"

					  type="number" 
					  class="form-control"
					  value="1"
					  min="1" />
					<slot></slot>
			</div>
		</div>
	</div>
</div>
`
});


Vue.component("thumb-pick-button",
{
	data: function ()
	{
		return {

		};
	},
	props:
	{
		picSrc:
		{
			type: String,
			required: true
		},
		itemId: [String, Number],
		picAlt: String,
		title:
		{
			type: String,
			required: true
		},
		descriptions:
		{
			type: String,
			required: true
		},
		harga: Number,
		callbackFn: String,
		disabled: Boolean
	},
	methods:
	{
		execute: function ()
		{
			console.log(this.callbackFn);
			eval(this.callbackFn);
		}
	},
	template:
`
<div class="col-md-3 valore-picker">
	<div class="card">
		<img class="card-img-top"
				v-bind:src="picSrc"
				v-bind:alt="picAlt" />
		<div class="card-body">
			<h5 class="card-title">
				{{title}}
			</h5>
			<p class="card-text">
				{{descriptions}}
				<br/>
				<b>Harga: {{harga}}</b>
			</p>
			<button class="btn btn-sm btn-primary" 
					v-bind:disabled="disabled"
					v-on:click="execute()">
				Pilih
			</button>
		</div>
	</div>
</div>
`
});


Vue.component("thumb-pick",
	{
		data: function () {
			return {

			};
		},
		props:
		{
			picSrc:
			{
				type: String,
				required: true
			},
			picAlt: String,
			title:
			{
				type: String,
				required: true
			},
			descriptions:
			{
				type: String,
				required: true
			}
		},
		template:
`
<div class="col-md-3 valore-picker">
	<div class="card">
		<img class="card-img-top"
				v-bind:src="picSrc"
				v-bind:alt="picAlt" />
		<div class="card-body">
			<h5 class="card-title">
				{{title}}
			</h5>
			<p class="card-text">
				{{descriptions}}
			</p>
			<slot></slot>
		</div>
	</div>
</div>
`
});

Vue.component("room-square",
{
	props:
	{
		no: [Number, String],
		floor: [Number, String],
		status: Boolean
	},
	template:
`
<div class="card" style="width: 12em;">
	<div class="card-body">
		<h5 class="card-title">Kamar No. {{no}}</h5>
		<h6 class="card-subtitle mb-2 text-muted">Lantai {{floor}}</h6>
		<p class="card-text" style="color:green" v-if="status">Free</p>
		<p class="card-text" style="color:red" v-else>Tertutup</p>
		<slot>
		</slot>
	</div>
</div>
`
});

Vue.component("item-grouped",
{
	props:
	{
		itemId: [String,Number],
		title: [String],
		qty: [String, Number]
	},
	methods:
	{
		onClick: function()
		{
			alert(this.itemId);
		}
	},
	template:
	`
<li class="list-group-item d-flex justify-content-between align-items-center"
	v-on:click="onClick">
		{{title}}
		<slot></slot>
    <span class="badge badge-primary badge-pill">{{qty}}</span>
</li>
	`
});

Vue.component("date-picker",
{
	props:
	{
		label: String,
		id: String,
		value:[String, Date],
		allowAllDate: Boolean
	},
	computed:
	{
		value:
		{
			get: function ()
			{
				function zeroPadding(num, digit) 
				{
						var zero = '';
						for(var i = 0; i < digit; i++) {
								zero += '0';
						}
						return (zero + num).slice(-digit);
				}
				
				if (this.enteredDate === null) return "Masukan tanggal";
				var
					dateString = zeroPadding(this.enteredDate.getDate(),2) +
						"/" + zeroPadding((this.enteredDate.getMonth() + 1),2) +
						"/" + zeroPadding(this.enteredDate.getFullYear(),4);
				return dateString;
			}
		}
	},
	data: function ()
	{
		return {
		enteredDate: null,
		attrs:
		[
			{
				key: 'today',	
				dates: new Date(2019, 2, 1),
				highlight: 
				{
					backgroundColor: '#ff8080'
				},
				contentStyle:
				{
					color: '#fafafa'
				},
				popover:
				{
					label: 'Rp 150 rb!'
				}
			},

			{
				key: 'today',
				dates: new Date(2019, 2, 10),
				highlight:
				{
					backgroundColor: 'lightgreen'
				},
				contentStyle:
				{
					color: 'white'
				},
				popover:
				{
					label: 'Rp 50 rb!'
				}
			}
		]};
	},
	watch: 
	{
		enteredDate:function ()
		{
			this.$emit('input', this.value);
		}
	},
	template:
`
<template>
	<v-date-picker v-bind:attributes='attrs' v-if="allowAllDate"
		v-model="enteredDate"
		v-bind:value="value"
		v-bind:min-date="new Date()  ">
			<div class="input-group input-group-sm mb-3" >
				<div class="input-group-prepend">
					<span class="input-group-text"
					style="min-width:200px">
					{{ label }}
					</span>
				</div>
				<input

				type="text"
				class="form-control"
				aria-label="Small"
				aria-describedby="inputGroup-sizing-sm"
				readonly=""
				style="background:white"
				v-bind:value="value"
				v-on:change="$emit('input', $event.target.value)" />
		</div>
	</v-date-picker>
	<v-date-picker v-bind:attributes='attrs' v-else
		v-model="enteredDate"
		v-bind:value="value">
			<div class="input-group input-group-sm mb-3" >
				<div class="input-group-prepend">
					<span class="input-group-text"
					style="min-width:200px">
					{{ label }}
					</span>
				</div>
				<input

				type="text"
				class="form-control"
				aria-label="Small"
				aria-describedby="inputGroup-sizing-sm"
				readonly=""
				style="background:white"
				v-bind:value="value"
				v-on:change="$emit('input', $event.target.value)" />
		</div>
	</v-date-picker>

</template>
`
	});

Vue.component("date-picker10",
{
	data: function ()
	{
		return {
			attributes:
				[
					{
						key: "today",
						highlight:
						{
							backgroundColor: "white"
						},
						dates: new Date()
					}
				]
		};
	},
	template:
`
<v-calendar v-bind:attributes="attributes">
</v-calendar>
`
});

Vue.component("modal", 
{
	data: function()
	{
		return {
			styleWindow: {
				minWidth :  this.width ,
				minHeight :  this.height,
			}
		};
	},
	props:
	{
		height:  String,
		width:  String
	},
	template:	
`
<transition name="modal">
<div class="modal-mask" v-bind:style="styleWindow">
  <div class="modal-wrapper">
	<div class="modal-container">
	  <div class="modal-header">
		<slot name="header">
		  default header
		</slot>
	  </div>

	  <div class="modal-body" v-bind:style="styleWindow">
		<slot name="body">
		  default body 
		</slot>
	  </div>

	  <div class="modal-footer">
		<slot name="footer">
		  
		</slot>
		<button class="btn btn-sm" @click="$emit('close')">
			Tutup [Esc]  
		  </button>
	  </div>
	</div>
  </div>
</div>
</transition>
`
});


Vue.component("control-card",
{
	data: function()
	{
		return {
			stylePicture: {
				backgroundImage: `url('${this.picSrc}')`,
				backgroundRepeat: "no-repeat",
				backgroundPosition:" 10rem 20px",
				position: "absolute",
				left: 0,
				top: 0,
				width: "100%",
				height: "100%",
				opacity: 0.3,
				zIndex: 0,
				pointerEvents: "none",
				backgroundSize: "contain"
			},
			styleText:
			{
				position: "relative",
				zIndex: 1,
			}
		}
	},
	props:
	{
		picSrc : String,
		text: String,
		header: String,
		subTitle: String,
	},
	template:
`
<div class="card bg-light mb-3" style="max-width: 18rem;">
	<div class="card-header">{{header}}</div>
		<div class="card-body" style="position: relative;overflow: hidden;">
			<h5 class="card-title" style="position:relative; z-index:1">{{subTitle}}</h5>	
			<div  v-bind:style="stylePicture">
			</div>
			<p class="card-text" style="position:relative; z-index:1">{{text}}</p>
			<div style="position:relative; z-index:1">
				<slot></slot>
			</div>
		</div>
	</div>
</div>
`
});

Vue.component("prompt",
{
	template:
`
<div class="prompt-mask">
	<div class="alert alert-dark prompt" 
			role="alert">
		<slot></slot>
	</div>
</div>
`
});

Vue.component('collapsible', 
{
	props: 
	{
		open: 
		{
      type: Boolean,
      default: false
		},
		title: String
  },
  methods: {
		applyState: function () 
		{
			if(this.open)
				this.mystyle.height = "auto"
			else
				this.mystyle.height = "50px";
    },
    toggle: function()
    {
      this.open = !this.open;
    }
  },
	mounted: function () 
	{
    this.applyState()
  },
	watch: 
	{
		open: function (val) 
		{
      this.applyState()
    }
  },
	data: function () 
	{
    return {
			mystyle: 
			{
        height: 0
      }
    }
	},
  template:
`
<div class="valore-collapsible" v-bind:style="mystyle">
	<div class="card-header">
		<a href="#"
			 v-on:click="toggle">
			<h5>{{ open ? "-" : "+" }} {{title}}</h5>
		</a>
	</div>	
    <div ref="content">
      <div class="valore-wrapper">
        <slot name="body"></slot>  
      </div>
    </div>      
  </div>
`
});

Vue.component("sidebar",
{
	template:
`
<div class="sidebar-sticky">
	<ul class="nav flex-column">
		
		<menu-list label="Proposal Pengadaan Barang"
						action="/ci/proposal/index"
						secondaryLabel="true">
		</menu-list>
		<menu-list label="Daftar Barang"
						action="/ci/barang/index"
						secondaryLabel="true">
		</menu-list>
		
		
	</ul>
</div>
`
});

Vue.component("clock",
{
	data: function()
	{
		return {
			time: "",
			date: ""
		}
	},
	methods:
	{
		updateTime: function() 
		{
			var 
				cd = new Date();


			function zeroPadding(num, digit) 
			{
					var zero = '';
					for(var i = 0; i < digit; i++) {
							zero += '0';
					}
					return (zero + num).slice(-digit);
			}

			this.time = zeroPadding(cd.getHours(), 2) + ':' + 
						zeroPadding(cd.getMinutes(), 2) + ':' + 
						zeroPadding(cd.getSeconds(), 2);
			this.date = zeroPadding(cd.getDate(), 2) + '/' + 
						zeroPadding(cd.getMonth()+1, 2) + '/' + 
						zeroPadding(cd.getFullYear(), 4) + ' ';
		}
	},
	created: function()
	{
		var 
			timerID = setInterval(this.updateTime, 1000);
		this.updateTime();
	},
	template:
`
	<h5>{{time}} - {{date}}</h5>
`
});


Vue.component("menu-bar",
{
	data: function()
	{
			return {
				about : false,
				show: false
			}
	},
	mixins: [VueClickaway.mixin],
	methods:
	{
		fileMenu: function(event)
		{
			this.show = true;
		},
		aboutMenu: function(event)
		{
			this.about = true;
		},
		closeFileMenu: function(evt)
		{
			this.show = false;
		},
	},
	template:
`
<div style="display: inline-block;">
	<div class="navbar-nav nav px-3 list-inline menubar">
		<span class="nav-item text-nowrap list-inline-item" style="width:50px">
			<a class="nav-link" href="#" v-on:click="fileMenu">File</a>
		</span>
		<slot name="additionalMenu"></slot>
		<span class="nav-item text-nowrap list-inline-item">
			<a class="nav-link" href="#" v-on:click="aboutMenu">About</a>
		</span>
	</div>
	<modal v-if="about" 
				 v-on:close="about = false">
		<div slot="body">
			<i>Love thy neighbor as thyself</i>
		</div>
	</modal>
	<div class="dropdown-menu" 
			 style="display:block"
			 v-if="show"
			 v-on-clickaway="closeFileMenu">
		<h6 class="dropdown-header">File</h6>
			<slot name="additionalDropdownMenu"> </slot>
			<a class="dropdown-item" href="#" onclick="window.history.back();window.history.back();">Kembali</a>
			<a class="dropdown-item" href="logon.htm">Ganti Pengguna</a>
			<a class="dropdown-item" href="about:blank">Keluar</a>
	</div>
</div>
`
});


