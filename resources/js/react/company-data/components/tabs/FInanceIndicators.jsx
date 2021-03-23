import React from 'react'
import {
  Table,
  Tbody,
  Tr,
  Td,
  Select,
  Flex,
  Spinner
} from "@chakra-ui/react"

export const FinanceIndicators = props => {
  const lastYear = 2016;
  const diffYears = new Array(new Date().getFullYear() - lastYear + 1).fill('').map((item, key) => lastYear + +key);
  const quarters = new Array(4).fill('').map((item, key) => ++key);

  const data = props.data;
  const lastQuarter = data.last_quarter;
  console.log(lastQuarter);
  if (data) {
    return (
      <div>
        <Table>
          <Tbody>
            <Tr>
              <Td>Выберете квартал год</Td>
              <Td>
                <Select placeholder="Select year" value={lastQuarter.year}>
                  {diffYears.map((item, key) =>
                    <option key={key} value={item}>{item}</option>)}
                </Select>
                <Select placeholder="Select quarter" value={lastQuarter.quarter}>
                  {quarters.map((item, key) =>
                    <option key={key} value={item}>{item}</option>)}
                </Select>
              </Td>
            </Tr>
            <Tr>
              <Td>Уставной фонд</Td>
              <Td>{lastQuarter.stock.toLocaleString() + " UZS"}</Td>
            </Tr>
            <Tr>
              <Td>Простые акции</Td>
              <Td>{lastQuarter.preference.toLocaleString()}</Td>
            </Tr>
            <Tr>
              <Td>Привилигированные акции</Td>
              <Td>{lastQuarter.dividendsPreference.toLocaleString()}</Td>
            </Tr>
            <Tr>
              <Td>Номинальная стоимость</Td>
              <Td>{lastQuarter.faceValue.toLocaleString() + " UZS"}</Td>
            </Tr>
            <Tr>
              <Td>Активы</Td>
              <Td>{lastQuarter.activesOnEnd.toLocaleString() + " UZS"}</Td>
            </Tr>
            <Tr>
              <Td>Собственный капитал</Td>
              <Td>{lastQuarter.capitalOnEnd.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Нераспределенная прибыль</Td>
              <Td>{lastQuarter.unallocatedProfits.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Обязательства</Td>
              <Td>{lastQuarter.commitments.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Долгосрочные обязательства</Td>
              <Td>{lastQuarter.longLine.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Краткосрочные</Td>
              <Td>{lastQuarter.shortLine.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Выручка</Td>
              <Td>{lastQuarter.proceeds.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Чистая прибыль</Td>
              <Td>{lastQuarter.profit.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Денежные средства</Td>
              <Td>{lastQuarter.moneyResources.toLocaleString() + " UZS"}</Td>
            </Tr>

            <Tr>
              <Td>Дивиденды</Td>
              <Td>empty</Td>
            </Tr>


          </Tbody>
        </Table>

      </div>
    )
  }
  return (
    <Flex justifyContent='center' alignItems='center'>
      <Spinner/>
    </Flex>
  )
};
