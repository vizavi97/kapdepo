import React, {useState, useEffect} from 'react'
import {Flex, Box, Select} from '@chakra-ui/react'

export const FinanceReport = props => {
  const quarters = new Array(4).fill('').map((item, key) => ++key);
  const years = [...new Set(props.balance.map(item => Number(item.year)))];
  const [infoArr, setInfoArr] = useState(props.balance);
  const [activeYear, setActiveYear] = useState(Math.max(...years));
  const [activeQuarter, setActiveQuarter] = useState(infoArr.filter(item => Number(item.year) === activeYear)[0].quarter);
  const [activeInfo, setActiveInfo] = useState(infoArr.filter((item) => (Number(item.year) === activeYear && Number(item.quarter) === activeQuarter))[0]);
  useEffect(() => {
    setActiveInfo(() => infoArr.filter((item) => (Number(item.year) === activeYear && Number(item.quarter) === activeQuarter))[0])
  }, [activeYear, activeQuarter]);
  const quarterHandler = event => {
    setActiveQuarter(Number(event.target.value));
  };
  const yearHandler = event => {
    setActiveYear(Number(event.target.value));
  };

  return (
    <>
      <Flex my={4} justifyContent={"center"} alignItems='center' w='100%'>
        <Box mx={".5rem"}>
          <Select value={activeQuarter} onChange={quarterHandler}>
            {quarters.map((item, key) =>
              <option key={key} value={item}>{item}</option>)}
          </Select>
        </Box>
        <Box mx={".5rem"}>
          <Select value={activeYear} onChange={yearHandler}>
            {years.map((item, key) =>
              <option key={key} value={item}>{item}</option>)}
          </Select>
        </Box>
      </Flex>
      <div className="row">
        <div className="col-md-12">
          {activeInfo ?
            <div className="report-table" dangerouslySetInnerHTML={{__html: activeInfo.body}}/>
            : <p>Информация по данному кварталу отсутсвует</p>
          }
        </div>
      </div>
    </>
  )
};
