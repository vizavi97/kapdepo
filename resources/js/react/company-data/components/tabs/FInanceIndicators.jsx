import React, {useState, useEffect} from 'react'
import {
  Table,
  Tbody,
  Thead,
  Th,
  Tr,
  Td,
  Select,
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalFooter,
  ModalBody,
  ModalCloseButton,
  Button,
  useDisclosure
} from "@chakra-ui/react";
import Highcharts from 'highcharts/highstock'
import HighchartsReact from "highcharts-react-official";

export const FinanceIndicators = props => {
  const lang = props.lang;
  const dividends = props.dividends;
  const sortQuarters = props.quarters.sort((a, b) => (a.year - b.year || a.quarter - b.quarter));
  const {isOpen, onOpen, onClose} = useDisclosure();
  const quarters = new Array(4).fill('').map((item, key) => ++key);
  const years = [...new Set(props.quarters.map(item => item.year))];
  const [infoArr, setInfoArr] = useState(props.quarters);
  const [activeYear, setActiveYear] = useState(Math.max(...years));
  const [activeQuarter, setActiveQuarter] = useState(infoArr.filter(item => item.year === activeYear)[0].quarter);
  const [activeInfo, setActiveInfo] = useState(infoArr.filter((item) => (item.year === activeYear && item.quarter === activeQuarter))[0]);
  useEffect(() => setActiveInfo(() => infoArr.filter(
    (item) => (item.year === activeYear && item.quarter === activeQuarter))[0]
    ),
    [activeYear, activeQuarter]);
  const quarterHandler = event => {
    setActiveQuarter(Number(event.target.value));
  };
  const yearHandler = event => {
    setActiveYear(Number(event.target.value));
  };

  const chartOptions = {
    chartOne: {
      chart: {
        type: 'column'
      },
      title: {
        text: null
      },
      xAxis: {
        categories: sortQuarters.map(item => item.year + "/" + item.quarter)
      },
      yAxis: {
        title: null,
        labels: {
          style: {
            display: "none"
          }
        },
        gridLineColor: '#fff'
      },
      credits: {
        enabled: false
      },
      series: [{
        name: `${lang.assets}`,
        data: sortQuarters.map(item => item.activesOnEnd)
      }, {
        name: `${lang.equity}`,
        data: sortQuarters.map(item => item.capitalOnEnd)
      }, {
        name: `${lang.retainedEarnings}`,
        data: props.quarters.map(item => item.unallocatedProfits)
      }]
    },
    chartTwo: {
      chart: {
        type: 'column'
      },
      title: {
        text: null
      },
      xAxis: {
        categories: sortQuarters.map(item => item.year + "/" + item.quarter)
      },
      yAxis: {
        title: null,
        labels: {
          style: {
            display: "none"
          }
        },
        gridLineColor: '#fff'
      },
      credits: {
        enabled: false
      },
      series: [{
        name: `${lang.liabilities}`,
        data: sortQuarters.map(item => item.commitments)
      }, {
        name: `${lang.longTermLiabilities}`,
        data: sortQuarters.map(item => item.longLine)
      }, {
        name: `${lang.shortTermLiabilities}`,
        data: props.quarters.map(item => item.shortLine)
      }]
    },
    chartThree: {
      chart: {
        type: 'column'
      },
      title: {
        text: null
      },
      xAxis: {
        categories: sortQuarters.map(item => item.year + "/" + item.quarter)
      },
      yAxis: {
        title: null,
        labels: {
          style: {
            display: "none"
          }
        },
        gridLineColor: '#fff'
      },
      credits: {
        enabled: false
      },
      series: [{
        name: `${lang.revenue}`,
        data: sortQuarters.map(item => item.proceeds)
      }, {
        name: `${lang.netProfit}`,
        data: sortQuarters.map(item => item.profit)
      }, {
        name: `${lang.cash}`,
        data: props.quarters.map(item => item.moneyResources)
      }]
    }

  };


  return (
    <div className='row'>
      <div className='col-md-5'>
        <Table>
          <Thead>
            <Tr>
              <Td>{lang.chooseQuarter}</Td>
              <Td>
                <Select value={activeQuarter} onChange={quarterHandler}>
                  {quarters.map((item, key) =>
                    <option key={key} value={item}>{item}</option>)}
                </Select>
              </Td>
            </Tr>
            <Tr>
              <Td>{lang.chooseYear}</Td>
              <Td>
                <Select value={activeYear} onChange={yearHandler}>
                  {years.map((item, key) =>
                    <option key={key} value={item}>{item}</option>)}
                </Select>
              </Td>
            </Tr>
          </Thead>
          {activeInfo ?
            <Tbody>
              <Tr>
                <Td>{lang.authorizedCapital}</Td>
                <Td>{activeInfo.stock.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.commonShares}</Td>
                <Td>{activeInfo.preference.toLocaleString()}</Td>
              </Tr>
              <Tr>
                <Td>{lang.preferredShares}</Td>
                <Td>{activeInfo.dividendsPreference.toLocaleString()}</Td>
              </Tr>
              <Tr>
                <Td>{lang.faceValue}</Td>
                <Td>{activeInfo.faceValue.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.assets}</Td>
                <Td>{activeInfo.activesOnEnd.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.equity}</Td>
                <Td>{activeInfo.capitalOnEnd.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.retainedEarnings}</Td>
                <Td>{activeInfo.unallocatedProfits.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.liabilities}</Td>
                <Td>{activeInfo.commitments.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.longTermLiabilities}</Td>
                <Td>{activeInfo.longLine.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.shortTermLiabilities}</Td>
                <Td>{activeInfo.shortLine.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.revenue}</Td>
                <Td>{activeInfo.proceeds.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.netProfit}</Td>
                <Td>{activeInfo.profit.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td>{lang.cash}</Td>
                <Td>{activeInfo.moneyResources.toLocaleString() + " UZS"}</Td>
              </Tr>
              <Tr>
                <Td><Button onClick={onOpen}>{lang.dividends}</Button></Td>
              </Tr>
            </Tbody>
            : <p>{lang.thisQuarterAbsent}</p>
          }
        </Table>
      </div>
      <div className='col-md-7'>
        {quarters.length > 0 ?
          <div>
            <div>
              <HighchartsReact style={{display: "flex", justifyContent: "flex-end"}}
                               highcharts={Highcharts}
                               options={chartOptions.chartOne}/>
            </div>
            <div>
              <HighchartsReact style={{display: "flex", justifyContent: "flex-end"}}
                               highcharts={Highcharts}
                               options={chartOptions.chartTwo}/>
            </div>
            <div>
              <HighchartsReact style={{display: "flex", justifyContent: "flex-end"}}
                               highcharts={Highcharts}
                               options={chartOptions.chartThree}/>
            </div>

          </div>

          :
          "Информация отсуствует"}
      </div>
      <Modal isOpen={isOpen} onClose={onClose} size={"3xl"}>
        <ModalOverlay/>
        <ModalContent>
          <ModalHeader>{lang.div}</ModalHeader>
          <ModalCloseButton/>
          <ModalBody>
            <Table variant="simple">
              <Thead>
                <Tr>
                  <Th>Год</Th>
                  <Th>По простым акциям</Th>
                  <Th>% от рыночный стоимости </Th>
                  <Th>По привилигированным акциям </Th>
                  <Th>% от рыночный стоимости</Th>
                </Tr>
              </Thead>
              <Tbody>
                {dividends.length > 0 ? dividends.map((item,key) => {
                  return (<Tr key={key}>
                    <Td>{item.year}</Td>
                    <Td>{item.sum}</Td>
                    <Td>{item.procent}</Td>
                    <Td>{item.preference}</Td>
                    <Td>{item.preferencePercent > 0 ? item.preferencePercent + "%" : '-'}</Td>
                  </Tr>)
                }) : <Tr><Td>Нет данных</Td></Tr>}
              </Tbody>
            </Table>
          </ModalBody>

          <ModalFooter>
            <Button colorScheme="blue" mr={3} onClick={onClose}>
              Закрыть
            </Button>
          </ModalFooter>
        </ModalContent>
      </Modal>
    </div>
  )
};
