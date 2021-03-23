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

//summary-table
export const All = props => {
  const data = props.data;
  if (data) {
    const minMax = data.min && data.max ? +data.min.last_price + " - " + data.max.last_price : 0;
    const lastDayValue = data.last_day.reduce((acc, value) => {
      return acc + Number(value.volume)
    }, 0);
    const yearMinMax = data.max_week && data.min_week ? +data.min_week + " - " + data.max_week : 0;
    const marketCap = (data.data.last_price * data.last_quarter.stock) + (Number(data.details.preference) * data.last_quarter.preference);
    const eps = (data.last_quarter.profit - data.last_quarter.preference * data.last_quarter.dividendsPreference) / data.last_quarter.stock;
    const bookValue = (data.last_quarter.capitalOnEnd / data.last_quarter.stock);
    const chartData = data.volume.sort((a, b) => a.timestamp - b.timestamp).map(item => [item.timestamp * 1000, item.last_price]);
    const options = {
      rangeSelector: {
        buttons: [{
          type: 'hour',
          count: 1,
          text: '1h'
        }, {
          type: 'day',
          count: 1,
          text: '1D'
        }, {
          type: 'all',
          count: 1,
          text: 'All'
        }],
        selected: 1,
        inputEnabled: false
      },
      series: [{
        data: chartData,
        lineWidth: 0.5,
      }],
      xAxis: {
        type: 'datetime'
      },
      gapSize: 5,
      tooltip: {
        valueDecimals: 2
      },
      threshold: null
    };
    return (
      <div className={'row'}>
        <div className={'col-md-4'}>
          <Table>
            <Tbody>
              <Tr>
                <Td>Цена закрытия</Td>
                <Td>{data.last_price_default.last_price + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>Дневной диапозон</Td>
                <Td>
                  {minMax + " UZS"}
                </Td>
              </Tr>
              <Tr>
                <Td>Дневной обьем</Td>
                <Td>{lastDayValue}</Td>
              </Tr>
              <Tr>
                <Td>52 недельный обьем</Td>
                <Td>{data.one_year_volume.toLocaleString()}</Td>
              </Tr>
              <Tr>
                <Td>52 недельный диапазон</Td>
                <Td>{yearMinMax.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>Рыночная капитализация</Td>
                <Td>{marketCap.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>Измение за месяц %</Td>
                <Td
                  style={{color: Number(data.change_month) > 0 ? "#39b839" : "#ff0017"}}>{data.change_month + "%"}</Td>
              </Tr>

              <Tr>
                <Td>Изменение за год %</Td>
                <Td style={{color: Number(data.change_year) > 0 ? "#39b839" : "#ff0017"}}>{data.change_year + "%"}</Td>
              </Tr>

              <Tr>
                <Td>В случаи капитализации</Td>
                <Td>
                  {(Number(data.last_quarter.unallocatedProfits) / Number(data.last_quarter.faceValue) / Number(data.last_quarter.stock))
                    .toFixed(2)}
                </Td>
              </Tr>

              <Tr>
                <Td>Балансовая стоимость</Td>
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
                <Td>Target</Td>
                <Td
                  style={{color: data.last_quarter.target > data.last_price_default.last_price ? "#39b839" : "#ff0017"}}>{data.last_quarter.target + " UZS"}</Td>
              </Tr>

              <Tr>
                <Td>Индикатор ликвидности</Td>
                <Td>{data.last_quarter.liquidityIndicator === "big" ? "Высокий" : "-"}</Td>
              </Tr>
            </Tbody>
          </Table>
        </div>
        <div className={'col-md-8'}>
          <HighchartsReact style={{display: "flex", justifyContent: "flex-end"}}
                           constructorType={'stockChart'}
                           highcharts={Highcharts}
                           options={options}/>
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


