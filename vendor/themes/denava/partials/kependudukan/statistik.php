<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<script type="text/javascript">
	let chart;
	const rawData = Object.values(<?= json_encode($stat) ?>);
	const type = '<?= $tipe == 1 ? 'column' : 'pie' ?>';
	const legend = Boolean(!<?= ($tipe) ?>);
	let categories = [];
	let data = [];
	let i = 1;
	let status_tampilkan = true;
	for (const stat of rawData) {
		if (stat.nama !== 'TOTAL' && stat.nama !== 'JUMLAH' && stat.nama != 'PENERIMA') {
			let filteredData = [stat.nama, parseInt(stat.jumlah)];
			categories.push(i);
			data.push(filteredData);
			i++;
		}
	}

	function tampilkan_nol(tampilkan = false) {
		if (tampilkan) {
			$(".nol").parent().show();
		} else {
			$(".nol").parent().hide();
		}
	}

	function toggle_tampilkan() {
		$('#showData').click();
		tampilkan_nol(status_tampilkan);
		status_tampilkan = !status_tampilkan;
		if (status_tampilkan) $('#tampilkan').text('Tampilkan Nol');
		else $('#tampilkan').text('Sembunyikan Nol');
	}

	function switchType(){
		var chartType = chart_penduduk.series[0].type;
		chart_penduduk.series[0].update({
			type: (chartType === 'pie') ? 'column' : 'pie'
		});
	}

	$(document).ready(function () {
		tampilkan_nol(false);
		if (<?=$this->setting->statistik_chart_3d?>) {
			chart_penduduk = new Highcharts.Chart({
				chart: {
					renderTo: 'container',
					options3d: {
						enabled: true,
						alpha: 45
					}
				},
				title: 0,
				yAxis: {
					showEmpty: false,
				},
				xAxis: {
					categories: categories,
				},
				plotOptions: {
					series: {
						colorByPoint: true
					},
					column: {
						pointPadding: -0.1,
						borderWidth: 0,
						showInLegend: false,
						depth: 45
					},
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
						depth: 45,
						innerSize: 70
					}
				},
				legend: {
					enabled: legend
				},
				series: [{
					type: type,
					name: 'Jumlah Populasi',
					shadow: 1,
					border: 1,
					data: data
				}]
			});
		} else {
			chart_penduduk = new Highcharts.Chart({
				chart: {
					renderTo: 'container'
				},
				title: 0,
				yAxis: {
					showEmpty: false,
				},
				xAxis: {
					categories: categories,
				},
				plotOptions: {
					series: {
						colorByPoint: true
					},
					column: {
						pointPadding: -0.1,
						borderWidth: 0,
						showInLegend: false,
					},
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
					}
				},
				legend: {
					enabled: legend
				},
				series: [{
					type: type,
					name: 'Jumlah Populasi',
					shadow: 1,
					border: 1,
					data: data
				}]
			});
		}

		$('#showData').click(function () {
			$('tr.lebih').show();
			$('#showData').hide();
			tampilkan_nol(false);
		});

	});
</script>
<style>
	tr.lebih {
		display: none;
	}
	
	.input-sm
	{
		padding: 4px 4px;
	}
	@media (max-width:780px)
	{
		.btn-group-vertical
		{
			display: block;
		}
	}
	.table-responsive
	{
		min-height:275px;
	}
</style>
<div class="article-single">
	<div class="statistikstyle">
		<div class="container-page mb-20">
			<div class="headingpage border-grey-soft bg-gradient-hor flexleft">
				<div class="headingpage-image border-grey-soft flexcenter"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/statistik.svg") ?>" alt=""/></div>
				<div class="articlehome-head flexleft"><h1>STATISTIK</h1></div>
          	</div>
			<div class="box-article mb-30 bg-white" style="border-radius:0 0 5px 5px;">
				<div class="relative-border p-15 border-grey-soft" style="border-radius:0 0 5px 5px;">
					<div class="gridview">
						<div class="sidebarright">
							<img style="width:100%;height:1px;display:block;" src="<?= base_url("$this->theme_folder/$this->theme/assets/images/empty-pic.png") ?>"/>
							<ul>
								<?php $this->load->view($folder_themes .'/partials/kependudukan/navigasi') ?>
							</ul>
						</div>
						<div class="head-content">
							<div style="text-align:center;"><h1>Statistik Data <?= $heading ?><br>Tahun <?= date('Y') ?></h1></div>
							<div class="relative-row flexcenter mb-20">
								<a class="tombol bg-color1 flexcenter" onclick="switchType();" style="margin:0 3px;">Ubah Grafik</a>
							</div>
							<div id="container"></div>
							<div class="head-module-center border-grey-soft flexcenter" style="margin-bottom:10px;margin-top:15px;">
								<h2>Tabel</h2>
							</div>
							<div class="table-statistik">
								<div class="table-responsive">
									<table class="table table-striped">
                                          <thead>
                                          <tr>
                                              <th rowspan="2">No</th>
                                              <th rowspan="2" style='text-align:left;'>Kelompok</th>
                                              <th colspan="2" style='text-align:center'>Jumlah</th>
                                              <th colspan="2" style='text-align:center'>Laki-laki</th>
                                              <th colspan="2" style='text-align:center'>Perempuan</th>
                                          </tr>
                                          <tr>
                                              <th style='text-align:center'>Jiwa</th><th style='text-align:center'>%</th>
                                              <th style='text-align:center'>Jiwa</th><th style='text-align:center'>%</th>
                                              <th style='text-align:center'>Jiwa</th><th style='text-align:center'>%</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                              <?php $i=0; $l=0; $p=0; $hide=""; $h=0; $jm1=1; $jm = count($stat);?>
                                              <?php foreach ($stat as $data):?>
                                              <?php $jm1++; if (1):?>
                                              <?php $h++; if ($h > 12 AND $jm > 10): $hide="lebih"; ?>
                                              <?php endif;?>
                                              <tr class="<?=$hide?>">
                                                  <td class="angka">
                                                      <?php if ($jm1 > $jm - 2):?>
                                                      <?=$data['no']?>
                                                      <?php else:?>
                                                      <?=$h?>
                                                      <?php endif;?>
                                                  </td>
                                                  <td><?=$data['nama']?></td>
                                                  <td class="angka <?php ($jm1 <= $jm - 2) and ($data['jumlah'] == 0) and print('nol')?>" style='text-align:center'><?=ribuan($data['jumlah'])?></td>
                                                  <td class="angka" style='text-align:center'><?=$data['persen']?></td>
                                                  <td class="angka" style='text-align:center'><?=ribuan($data['laki'])?></td>
                                                  <td class="angka" style='text-align:center'><?=$data['persen1']?></td>
                                                  <td class="angka" style='text-align:center'><?=ribuan($data['perempuan'])?></td>
                                                  <td class="angka" style='text-align:center'><?=$data['persen2']?></td>
                                              </tr>
                                              <?php $i += $data['jumlah'];?>
                                              <?php $l += $data['laki']; $p += $data['perempuan'];?>
                                              <?php endif;?>
                                              <?php endforeach;?>
                                          </tbody>
                                      </table>
									<div class="flexcenter">
										<?php if($hide=="lebih"):?>
											<button class='tombol bg-grey-dark' id='showData' style='margin:0 2px;'>Selengkapnya...</button>
										<?php endif;?>
										<button id='tampilkan' onclick="toggle_tampilkan();" class="tombol bg-grey-dark" style='margin:0 2px;'>Tampilkan Nol</button>
									</div>
								</div>
							</div>
							<?php if ($this->setting->daftar_penerima_bantuan && in_array($st, array('bantuan_keluarga', 'bantuan_penduduk'))):?>
								<section class="content mt-20">
									<div class="row">
										<div class="col-md-12">
											<input id="stat" type="hidden" value="<?=$st?>">
											<div class="">
												<div class="head-module-center border-grey-soft flexcenter" style="margin-bottom:10px;margin-top:15px;"><h2>Daftar <?= $heading ?></h2></div>
												<div class="table-responsive">
													<table class="table table-striped table-bordered" id="peserta_program">
														<thead>
															<tr>
																<th>No</th>
																<th>Program</th>
																<th>Nama Peserta</th>
																<th>Alamat</th>
															</tr>
														</thead>
														<tfoot>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
								</section>
								<script type="text/javascript">
									$(document).ready(function() {
										var url = "<?= site_url('first/ajax_peserta_program_bantuan')?>";
										table = $('#peserta_program').DataTable({
											'processing': true,
											'serverSide': true,
											"pageLength": 10,
											'order': [[2, 'asc']],
											"ajax": {
												"url": url,
												"type": "POST",
												"data": {stat: $('#stat').val()}
											},
										//Set column definition initialisation properties.
										"columnDefs": [
										{
												"targets": [ 0, 3 ], //first column / numbering column
												"orderable": false, //set not orderable
											},
											],
											'language': {
												'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
											},
											'drawCallback': function (){
												$('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
											}
										});
									} );
								</script>
							<?php endif;?>
						</div>
					</div>
					<div class="small-screen"><?php $this->load->view($folder_themes .'/partials/kependudukan/navigasi') ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
