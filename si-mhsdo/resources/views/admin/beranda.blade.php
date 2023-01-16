@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="form-group ml-4 mt-2">
      <label>Total Mahasiswa Terancam DO</label>
      <div class="form-row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa Semester 3</span>
              <span class="info-box-number">{{ $jlhmhs_smstr3 }}<small> Orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-graduation-cap"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa Semester 13</span>
              <span class="info-box-number">{{ $jlhmhs_smstr13 }}<small> Orang</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div>

    {{-- <div class="form-group ml-4 mt-2">
      <label>Total Admin Sistem</label>
      <div class="form-row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Admin Sistem</span>
              <span class="info-box-number">xxx</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div> --}}

    <div class="card">
      <div class="card-header bg-secondary">
          <b>Grafik Persebaran Mahasiswa Terancam Drop Out</b>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
      </div>
      <div class="card-body">
        <div id="grafiktotal"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header bg-danger">
              <b>Grafik Persebaran Mahasiswa Semester 3 Terancam Drop Out</b>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
          </div>
          <div class="card-body">
            <div id="grafikpersemester3"  class="grafik-responsive"></div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header bg-warning">
              <b>Grafik Persebaran Mahasiswa Semester 13 Terancam Drop Out</b>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
          </div>
          <div class="card-body">
            <div id="grafikpersemester13" class="grafik-responsive"></div>
          </div>
        </div>
      </div>
    </div>
    

    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">

  //GRAFIK TOTAL KESELURUHAN MAHASISWA TERANCAM DO
  var totalmhs_terancamdo = {!! json_encode($total_mhsdo_perfakultas)!!};
  var fakultas = {!! json_encode($fakultas) !!};

  // //==============
  // //===BAR CHART==
  // //==============
  // Highcharts.chart('grafiktotal', {
  //     chart: {
  //         type: 'column'
  //     },
  //     title: {
  //         text: 'Grafik Total Mahasiswa Terancam Drop Out per Fakultas'
  //     },
  //     xAxis: {
  //         categories: fakultas,
  //         crosshair: true
  //     },
  //     yAxis: {
  //         min: 0,
  //         title: {
  //             text: 'Total Mahasiswa'
  //         }
  //     },
  //     tooltip: {
  //         headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
  //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
  //             '<td style="padding:3"><b> {point.y:f} <small>Orang</small></b></td></tr>',
  //         footerFormat: '</table>',
  //         shared: true,
  //         useHTML: true
  //     },
  //     plotOptions: {
  //         column: {
  //             pointPadding: 0.2,
  //             borderWidth: 0
  //         },
  //     },
  //     series: [{
  //         name: 'Jumlah Mahasiswa Terancam DO',
  //         data: totalmhs_terancamdo

  //     }]
  // });
  
  
  //==============
  //===PIE CHART==
  //==============
  // Highcharts.chart('grafiktotal',   {
  //     chart: {
  //         plotBackgroundColor: null,
  //         plotBorderWidth: null,
  //         plotShadow: false,
  //         type: 'pie'
  //     },
  //     title: {
  //         text: 'Grafik Total Mahasiswa Terancam Drop Out per Fakultas'
  //     },
  //     tooltip: {
  //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  //     },
  //     accessibility: {
  //         point: {
  //             valueSuffix: '%'
  //         }
  //     },
  //     plotOptions: {
  //         pie: {
  //             allowPointSelect: true,
  //             cursor: 'pointer',
  //             dataLabels: {
  //                 enabled: true,
  //                 format: '<b>{point.name}</b>: {point.y: f} <small>Orang</small>'
  //             },
  //             showInLegend: true
  //         }
  //     },
  //     series: [{
  //         name: 'Jumlah Mahasiswa Terancam Drop Out',
  //         colorByPoint: true,
  //         // data : [
  //         //   {
  //         //     for (let i = 0; i < fakultas.length; i++) {
  //         //       {name = fakultas[i], y = totalmhs_terancamdo[i]}
                
  //         //     };
  //         //   }
  //         // ]
  //         data: [
  //           {name: fakultas[0] , y: totalmhs_terancamdo[0]},
  //           {name: fakultas[1] , y: totalmhs_terancamdo[1]},
  //           {name: fakultas[2] , y: totalmhs_terancamdo[2]},
  //           {name: fakultas[3] , y: totalmhs_terancamdo[3]},
  //           {name: fakultas[4] , y: totalmhs_terancamdo[4]},
  //           {name: fakultas[5] , y: totalmhs_terancamdo[5]},
  //           {name: fakultas[6] , y: totalmhs_terancamdo[6]},
  //           {name: fakultas[7] , y: totalmhs_terancamdo[7]},
  //           {name: fakultas[8] , y: totalmhs_terancamdo[8]},
  //           {name: fakultas[9] , y: totalmhs_terancamdo[9]},
  //           {name: fakultas[10] , y: totalmhs_terancamdo[10]},
  //           {name: fakultas[11] , y: totalmhs_terancamdo[11]},
  //           {name: fakultas[12] , y: totalmhs_terancamdo[12]},
  //           {name: fakultas[13] , y: totalmhs_terancamdo[13]},
  //           {name: fakultas[14] , y: totalmhs_terancamdo[14]},
  //         ]   
  //     }]
  // });

  //===================
  //===BAR RACE CHART==
  //===================
    Highcharts.chart('grafiktotal', {
      chart: {
          type: 'bar'
      },
      title: {
          text: 'Grafik Total Mahasiswa Terancam Drop Out per Fakultas'
      },
      xAxis: {
          categories: fakultas,
          title: {
              text: null
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Jumlah Mahasiswa',
              align: 'high'
          },
          labels: {
              overflow: 'justify'
          }
      },
      tooltip: {
          valueSuffix: ' orang'
      },
      plotOptions: {
          bar: {
              dataLabels: {
                  enabled: true
              }
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -80,
          y: 120,
          floating: true,
          borderWidth: 1,
          backgroundColor:
              Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
          shadow: true
      },
      credits: {
          enabled: false
      },
      series: [{
          name: 'Jumlah Mahasiswa Terancam DO',
          data: totalmhs_terancamdo

      }]
    });

  //GRAFIK PER SEMESTER 3 MAHASISWA TERANCAM DO
  var smstr3_mhsdo = {!! json_encode($total_mhsdo_smstr3)!!};
  var fklts3 = {!! json_encode($fakultas3) !!};
  Highcharts.chart('grafikpersemester3', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Grafik Total Mahasiswa Semester 3 Terancam Drop Out per Fakultas'
      },
      xAxis: {
          categories: fklts3,
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Total Mahasiswa'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
              '<td style="padding:3"><b> {point.y:f} <small>Orang</small></b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          },
      },
      series: [{
          name: 'Semester 3',
          data: smstr3_mhsdo

      }]
  });

  //GRAFIK PER SEMESTER 3 MAHASISWA TERANCAM DO
  var smstr13_mhsdo = {!! json_encode($total_mhsdo_smstr13)!!};
  var fklts13 = {!! json_encode($fakultas13) !!};
  Highcharts.chart('grafikpersemester13', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Grafik Total Mahasiswa Semester 13 Terancam Drop Out per Fakultas'
      },
      xAxis: {
          categories: fklts13,
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Total Mahasiswa'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px"><b>{point.key}</b></span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
              '<td style="padding:3"><b> {point.y:f} <small>Orang</small></b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          },
      },
      series: [{
          name: 'Semester 13',
          data: smstr13_mhsdo

      }]
  });

</script>

@endsection