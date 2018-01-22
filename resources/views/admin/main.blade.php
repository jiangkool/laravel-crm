@extends('layouts.admin')

@section('content')
<div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">系统首页</strong></div>
      </div>

   
    <div class="am-g">
        <div class="am-u-md-6">
          <div class="am-panel am-panel-default">
            <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-1'}">配置信息<span class="am-icon-chevron-down am-fr" ></span></div>
            <div class="am-panel-bd am-collapse am-in" id="collapse-panel-1">
              <ul class="am-list admin-content-file">
                <li>
                  <strong><span class="am-icon-television"></span> 系统版本</strong>
                  <p><span class="am-badge am-badge-success">{{php_uname('s')}}</span>  <span  class="am-badge am-badge-success">PORT:{{  $_SERVER['SERVER_PORT']}}</span></p>
                </li>
                <li>
                  <strong><span class="am-icon-check"></span> 运行环境</strong>
                  <p><span class="am-badge am-badge-success">PHP环境：{{ php_sapi_name() }}</span>  <span  class="am-badge am-badge-success"> PHP版本:{{PHP_VERSION}}</span></p>
                </li>
                <li>
                  <strong><span class="am-icon-check"></span> 服务器IP</strong>
                  <p><span  class="am-badge am-badge-success"> {{ GetHostByName($_SERVER['SERVER_NAME']) }}</span></p>
                </li>
              </ul>
            </div>
          </div>
         
        </div>
      </div>
     <script>
  require.config({
            paths: {
                echarts: '/echarts-2.2.7/build/dist'
            }
        });
  require( [
                'echarts',
                'echarts/chart/line',
                'echarts/chart/bar'
            ],
            function (ec) {
                var myChart = ec.init(document.getElementById('collapse-panel-2'));
                var option = {
                    tooltip : {trigger: 'axis'}, 
                    legend: {
                      data:['当天报名','本月报名','全部报名']
    },
    toolbox: {
        show : true,
        feature : {
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : [
            ]
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'当天报名',
            type:'line',
            stack: '总量',
            data:[
              ]
        },
        {
            name:'本月报名',
            type:'line',
            stack: '总量',
            data:
        },
        {
            name:'全部报名',
            type:'line',
            stack: '总量',
            data:
        }
    ]
                }
                myChart.setOption(option);
            }
        );

</script>
@endsection