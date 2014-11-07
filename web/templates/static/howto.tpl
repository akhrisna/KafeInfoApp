<!-- javascripts included -->
<script src="js/mootools.js" type="text/javascript"></script>
<script src="js/sliding-tabs.js" type="text/javascript"></script>

<!-- the how to page -->
<div class="howto">
	<div class="howto_padding">
	
		<!-- the navigation starts -->
		<div class="howto_navigation">
			<ul id="buttons" class="howto_navigaton_list">
				<li><a href="javascript:void(null);">{#createaccount#}</a></li>
				<li><a href="javascript:void(null);">{#sendnews#}</a></li>
				<li><a href="javascript:void(null);">{#votenews#}</a></li>
			</ul>
			
			<!-- mozilla bug fix -->
			<div class="mozillaBugFix"></div>
		</div>
		
		<!-- the how to content -->
		<div class="howto_base">
			<div id="panes" class="panes">
				<div id="howto_content">
					<div class="pane">
						<div class="pane_left">
							<h2>Registrasi</h2>	
							<p>
								Setelah anda melakukan registrasi di Kafeinfo, anda akan mendapatkan email aktivasi untuk akun anda. 
								Ikuti langkah sederhana di email anda untuk melengkapi registrasi anda. Setelah akun anda diaktifkan,
								anda dapat menggunakan semua fasilitas Kafeinfo Bookmarking Sosial.
							</p>
							<p>
								Apabila anda tidak merasa mendapatkan email aktivasi untuk akun anda, silahkan cek spam box anda atau
								gunakan fasilitas Kafeinfo Bookmarking Sosial untuk mengirimkan kembali email aktivasi akun anda.
							</p>
						</div>
						<div class="pane_right">
							<img src="images/ic_help1.gif" alt="Registrasi"/>						
						</div>
					</div>
					<div class="pane">
						<div class="pane_left_middle">
							<img src="images/ic_help2.gif" alt="Kirim berita"/>
						</div>
						<div class="pane_right_middle">
							
							<h2>Kirim berita</h2>	
							<p>
								Apabila anda menemukan berita atau artikel yang anda anggap menarik di internet, segera kirimkan berita 
								tersebut di Kafeinfo Bookmarking Sosial untuk berbagi dengan komunitas Kafeinfo.
							</p>
							<p>	
								Untuk mengirimkan berita atau artikel tersebut, anda hanya cukup mengirimkan link berita tersebut di fasilitas
								kirim berita Kafeinfo Bookmarking Sosial. Jangan lupa juga untuk memasukkan judul dan penjelasan pendek tentang berita tersebut dan ikuti 
								langkah langkah yang sangat mudah untuk dimengerti. 
							</p>
						</div>
					</div>
					<div class="pane">
						<div class="pane_left">
							<h2>Pilih dan Kubur berita</h2>	
							<p>
								Berita atau artikel yang anda kirimkan akan segera masuk pada halaman <strong>BERITA BARU</strong> dengan nilai pilihan 1. 
								Apabila user lain yang membaca berita anda menganggap berita atau artikel anda menarik, mereka dapat memilih 
								berita anda dan secara otomatis akan menaikkan nilai pilihan berita anda. 
							</p>
							<p>
								Apabila berita anda telah mendapatkan cukup pilihan, berita tersebut akan segera masuk pada halaman <strong>POPULER</strong>. 
								Ingat, anda tidak dapat menaikkan nilai pilihan berita anda sendiri, hanya orang lain yang membaca berita anda dapat 
								menentukan berita itu menarik atau tidak. 
							</p>
						</div>
						<div class="pane_right">
							<img src="images/ic_help3.gif" alt="Pilih dan Kubur berita"/>
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