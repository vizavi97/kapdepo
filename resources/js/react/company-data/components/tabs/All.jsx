import React from 'react'
import {
  Table,
  Tbody,
  Tr,
  Td,
  Spinner,
  Flex
} from "@chakra-ui/react"
import Highcharts from 'highcharts/highstock'
import HighchartsReact from "highcharts-react-official";

import indicatorsAll from "highcharts/indicators/indicators-all";
import priceIndicator from "highcharts/modules/price-indicator";
import stockTools from "highcharts/modules/stock-tools";
import annotationsAdvanced from "highcharts/modules/annotations-advanced";
import fullScreen from "highcharts/modules/full-screen";


//indicator css
import 'highcharts/css/stocktools/gui.css'
import 'highcharts/css/annotations/popup.scss'

indicatorsAll(Highcharts);
annotationsAdvanced(Highcharts);
priceIndicator(Highcharts);
stockTools(Highcharts);
fullScreen(Highcharts);


//summary-table
export const All = props => {
  const data = props.data;
  if (data) {
    const lang = props.lang;
    const minMax = data.min && data.max ? +data.min.last_price + " - " + data.max.last_price : 0;
    const lastDayValue = data.last_day.reduce((acc, value) => {
      return acc + Number(value.volume)
    }, 0);
    const yearMinMax = data.max_week && data.min_week ? +data.min_week + " - " + data.max_week : 0;
    const marketCap = (data.data.last_price * data.last_quarter.stock) + (Number(data.details.preference) * data.last_quarter.preference);
    const eps = (data.last_quarter.profit - data.last_quarter.preference * data.last_quarter.dividendsPreference) / data.last_quarter.stock;
    const bookValue = (data.last_quarter.capitalOnEnd / data.last_quarter.stock);
    const chartData = data.volume.sort((a, b) => a.timestamp - b.timestamp).map(item => [item.timestamp * 1000, item.last_price]);
    const chartVolume = data.volume.sort((a, b) => a.timestamp - b.timestamp).map(item => [item.timestamp * 1000, Number(item.volume)]);
    const chartDataPreference = data.preference_volume.sort((a, b) => a.timestamp - b.timestamp).map(item => [item.timestamp * 1000, item.last_price]);
    const chartVolumePreference = data.preference_volume.sort((a, b) => a.timestamp - b.timestamp).map(item => [item.timestamp * 1000, Number(item.volume)]);

    const options = {
      rangeSelector: {
        selected: 1
      },

      title: {
        text: `${lang.commonShares}`
      },
      xAxis: {
        labels: {enabled: false},
        gridLineWidth: 0,
      },
      yAxis: [{
        labels: {
          align: 'left'
        },
        height: '80%',
        resize: {
          enabled: true
        }
      }, {
        labels: {
          align: 'left'
        },
        top: '80%',
        height: '20%',
        offset: 0
      }],
      legend: {enabled: false},

      series: [{
        name: "Value",
        data: chartData,
        tooltip: {
          valueDecimals: 2
        }
      },
        {
          type: 'column',
          name: 'Volume',
          data: chartVolume,
          yAxis: 1
        }
      ],
      responsive: {
        rules: [{
          condition: {
            maxWidth: 300
          },

          chartOptions: {
            rangeSelector: {
              inputEnabled: false
            }
          }
        }]
      }
    };
    const optionsPreference = {
      rangeSelector: {
        selected: 1
      },
      yAxis: [{
        labels: {
          align: 'left'
        },
        height: '80%',
        resize: {
          enabled: true
        }
      }, {
        labels: {
          align: 'left'
        },
        top: '80%',
        height: '20%',
        offset: 0
      }],
      title: {
        text: `${lang.preferredShares}`
      },

      series: [{
        name: null,
        data: chartDataPreference,
        tooltip: {
          valueDecimals: 2
        }
      },
        {
          type: 'column',
          name: 'Volume',
          data: chartVolumePreference,
          yAxis: 1
        }
      ],

    };

    return (
      <div className={'row'}>
        <div className={'col-md-4'}>
          <Table>
            <Tbody>
              <Tr>
                <Td>{lang.closingPrice}</Td>
                <Td>{data.last_price_default.last_price + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.dailyRange}</Td>
                <Td>
                  {minMax + " UZS"}
                </Td>
              </Tr>
              <Tr>
                <Td>{lang.dailyVolume}</Td>
                <Td>{lastDayValue}</Td>
              </Tr>
              <Tr>
                <Td>{lang.weekVolume52}</Td>
                <Td>{data.one_year_volume.toLocaleString()}</Td>
              </Tr>
              <Tr>
                <Td>{lang.weekRange52}</Td>
                <Td>{yearMinMax.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.marketKapitalization}</Td>
                <Td>{marketCap.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.monthChange} %</Td>
                <Td
                  style={{color: Number(data.change_month) > 0 ? "#39b839" : "#ff0017"}}>{data.change_month + "%"}</Td>
              </Tr>

              <Tr>
                <Td>{lang.yearChange} %</Td>
                <Td style={{color: Number(data.change_year) > 0 ? "#39b839" : "#ff0017"}}>{data.change_year + "%"}</Td>
              </Tr>

              <Tr>
                <Td>{lang.inCasesOfCapitalization}</Td>
                <Td>
                  {(Number(data.last_quarter.unallocatedProfits) / Number(data.last_quarter.faceValue) / Number(data.last_quarter.stock))
                    .toFixed(2)}
                </Td>
              </Tr>

              <Tr>
                <Td>{lang.bookValue}</Td>
                <Td>{bookValue.toFixed(2) + " UZS"}</Td>
              </Tr>

              <Tr>
                <Td>P/E</Td>
                <Td>{(data.data.last_price / eps).toFixed(2)}</Td>
              </Tr>

              <Tr>
                <Td>P/B</Td>
                <Td>{(data.data.last_price / bookValue).toFixed(2)}</Td>
              </Tr>

              <Tr>
                <Td>ROA</Td>
                <Td>{((data.last_quarter.profit /
                  ((data.last_quarter.activesOnEnd + data.last_quarter.activesOnStart) / 2) * 100)
                  .toFixed(2)) + "%"}</Td>
              </Tr>

              <Tr>
                <Td>ROE</Td>
                <Td>{((data.last_quarter.profit /
                  ((data.last_quarter.capitalOnEnd + data.last_quarter.capitalOnStart) / 2) * 100)
                  .toFixed(2)) + "%"}</Td>
              </Tr>


              <Tr>
                <Td>D/E</Td>
                <Td>{(data.last_quarter.commitments / data.last_quarter.capitalOnEnd).toFixed(2)}</Td>
              </Tr>

              <Tr>
                <Td>EPS</Td>
                <Td>{eps.toFixed(2) + " UZS"}</Td>
              </Tr>

              <Tr>
                <Td>EV/EBIT</Td>
                <Td>{((marketCap + (data.last_quarter.commitments - data.last_quarter.moneyResources)) / data.last_quarter.ebit).toFixed(2)}</Td>
              </Tr>
              <Tr>
                <Td>{lang.targetPrice}</Td>
                <Td
                  style={{color: data.last_quarter.target > data.last_price_default.last_price ? "#39b839" : "#ff0017"}}>{data.last_quarter.target + " UZS"}</Td>
              </Tr>

              <Tr>
                <Td>{lang.liquidityIndicator}</Td>
                <Td>{data.last_quarter.liquidityIndicator === "big" ? "Высокий" : "-"}</Td>
              </Tr>
            </Tbody>
          </Table>
        </div>
        <div className={'col-md-8'}>
          <div className='my-4 position-relative overflow-hidden'>

            <HighchartsReact style={{display: "flex", justifyContent: "flex-end", overflow: "hidden"}}
                             highcharts={Highcharts}
                             constructorType={"stockChart"}
                             options={options}/>
          </div>
          {data.preference_volume.length > 0 ?
            <div className='my-4 position-relative overflow-hidden'>
              <HighchartsReact style={{display: "flex", justifyContent: "flex-end", overflow: "hidden"}}
                               constructorType={"stockChart"}
                               highcharts={Highcharts}
                               options={optionsPreference}/>
            </div> : null}
        </div>
      </div>
    )
  }
  return (
    <Flex justifyContent={'center'} alignItems={'center'} py={4} w='100%'>
      <Spinner color="red.500"/>
    </Flex>
  )
};
