<!-- javascripts included -->
<script src="js/mootools.js" type="text/javascript"></script>
<script src="js/sliding-tabs.js" type="text/javascript"></script>

<!-- terms of use -->
<div class="termsofuse">
	<div class="termsofuse_padding">
	
		<!-- the navigation starts -->
		<div class="termsofuse_navigation">
			<ul id="buttons" class="termsofuse_navigaton_list">
				<li><a href="javascript:void(null);">KETENTUAN PAKAI</a></li>
				<li><a href="javascript:void(null);">COPYRIGHT</a></li>
			</ul>
			
			<!-- mozilla bug fix -->
			<div class="mozillaBugFix"></div>
		</div>
		
		<!-- the how to content -->
		<div class="termsofuse_base">
			<div id="panes" class="panes">
				<div id="termsofuse_content">
					<div class="pane_terms">
						<div>
							<h2>Ketentuan Pakai</h2>	
							<p style="margin:15px 0px 5px 0px;">
								Sebagai pengunjung dan pengguna dari Kafeinfo, anda dilarang untuk menggunakan sarana situs ini untuk tindakan diluar 
								hukum dan peraturan domestik dari Kafeinfo. Berikut ini adalah beberapa contoh hal-hal yang kami larang dalam penggunaan Kafeinfo:
							</p>
							<ul>
								<li>Mengancam, menganggu atau mengintimidasi anggota Kafeinfo lain</li>
								<li>Memposting berita, gambar atau video yang mengandung kekerasan, pornografi dan singgungan atas ras, grup, agama ataupun individual tertentu</li>
								<li>Mempositing berita, gambar atau video yang terikat dalam suatu copyright oleh pemilik</li>
								<li>Menaruh berita, gambar atau video yang bisa diklasifikasikan sebagai "Spam"</li>
								<li>Mengiklankan dan menjalankan transaksi jual-beli produk dan servis dalam bentuk apapun kepada anggota lain, hubungi tim admin Kafeinfo di admin@kafeinfo.com 
								jika anda tetap ingin melakukan hal ini</li>
								<li>Memposting berita, gambar atau video dengan link yang berhubungan dengan multi-level marketing dan diluar topik</li>
								<li>Memperjualbelikan profil anda ke orang lain</li>
								<li>Mencoba meniru atau berpura-pura menjadi anggota lain atau admin Kafeinfo.</li>
							</ul>
						</div>
					</div>
					<div class="pane_terms">
						<div>
							<h2>Trademark</h2>	
							<p style="margin:15px 0px 5px 0px;">
								Nama, logo, icon dan grafis yang ada di website ini adalah mutlak milik Kafeinfo. Dilarang menggunakan atau menduplikasi aset Kafeinfo tanpa izin.
							</p>
							<h2 style="margin-top:30px;">Modifikasi Ketentuan Pakai</h2>	
							<p style="margin:15px 0px 5px 0px;">
								Kafeinfo memiliki hak mutlak untuk mengganti atau memodifikasi isi dari ketentuan pakai ini kapan saja tanpa pemberitahuan. 
								Adalah kewajiban setiap pengguna untuk tetap mawas kepada penggantian ketentuan-ketentuan Kafeinfo.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


{* initialize javascript *}
{literal}
	<script type="text/javascript" charset="utf-8">
		window.addEvent('load', function () {
			myTabs = new SlidingTabs('buttons', 'panes');
			
			// this sets up the previous/next buttons, if you want them
			$('previous').addEvent('click', myTabs.previous.bind(myTabs));
			$('next').addEvent('click', myTabs.next.bind(myTabs));
			
			// this sets it up to work even if it's width isn't a set amount of pixels
			window.addEvent('resize', myTabs.recalcWidths.bind(myTabs));
		});
	</script>
{/literal}