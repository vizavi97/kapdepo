import React, {useState} from 'react';
import {FormControl, Input, FormLabel, Flex} from '@chakra-ui/react'
import {HStack} from "@chakra-ui/layout";
import {Radio, RadioGroup} from "@chakra-ui/radio";


export const CreateElement = () => {
  const [form, setForm] = useState({
    unallocatedProfits: '',
    commitments: '',
    longLine: '',
    shortLine: '',
    proceeds: '',
    profit: '',
    moneyResources: '',
    activesOnStart: '',
    activesOnEnd: '',
    capitalOnStart: '',
    capitalOnEnd: '',
    faceValue: '',
    stock: '',
    preference: '',
    dividends: '',
    EBIT: '',
    liquidityIndicator: '',
  });
  return (
    <>
      <Flex flexDirection={"column"} w={"100%"} my={4}>
        <FormControl id="unallocatedProfits" isRequired mb={2}>
          <FormLabel>Нераспределенная прибыль</FormLabel>
          <Input placeholder="Нераспределенная прибыль" name="unallocatedProfits" type={'number'}/>
        </FormControl>
        <FormControl id="commitments" isRequired mb={2}>
          <FormLabel>Обязательства</FormLabel>
          <Input placeholder="Обязательства" name='commitments' type={'number'}/>
        </FormControl>

        <FormControl id="longLine" isRequired mb={2}>
          <FormLabel>Долгосрочные</FormLabel>
          <Input placeholder="Долгосрочные" name='longLine' type={'number'}/>
        </FormControl>


        <FormControl id="shortLine" isRequired mb={2}>
          <FormLabel>Кратко-срочные</FormLabel>
          <Input placeholder="Кратко-срочные" name='shortLine' type={'number'}/>
        </FormControl>

        <FormControl id="proceeds" isRequired mb={2}>
          <FormLabel>Выручка</FormLabel>
          <Input placeholder="Выручка" name='proceeds' type={'number'}/>
        </FormControl>

        <FormControl id="profit" isRequired mb={2}>
          <FormLabel>Чистая</FormLabel>
          <Input placeholder="прибыль" name='profit' type={'number'}/>
        </FormControl>

        <FormControl id="moneyResources" isRequired mb={2}>
          <FormLabel>Денежные средства</FormLabel>
          <Input placeholder="Денежные средства" name='moneyResources' type={'number'}/>
        </FormControl>

        {/*activesOnStart*/}
        <FormControl id="activesOnStart" isRequired mb={2}>
          <FormLabel>Активы на начало отчетного периода</FormLabel>
          <Input placeholder="Активы на начало отчетного периода" name='activesOnStart' type={'number'}/>
        </FormControl>
        {/*activesOnEnd*/}
        <FormControl id="activesOnEnd" isRequired mb={2}>
          <FormLabel>Активы на начало отчетного периода</FormLabel>
          <Input placeholder="Активы на конец отчетного периода" name='activesOnEnd' type={'number'}/>
        </FormControl>

        {/*capitalOnStart*/}
        <FormControl id="capitalOnStart" isRequired mb={2}>
          <FormLabel>Собственный капитал на начало отчетнного периода</FormLabel>
          <Input placeholder="Собственный капитал на начало отчетнного периода" name='capitalOnStart' type={'number'}/>
        </FormControl>

        {/*capitalOnEnd*/}
        <FormControl id="capitalOnEnd" isRequired mb={2}>
          <FormLabel>Собственный капитал на конец отчетнного периода</FormLabel>
          <Input placeholder="Собственный капитал на конец отчетнного периода" name='capitalOnEnd' type={'number'}/>
        </FormControl>


        {/*faceValue*/}
        <FormControl id="faceValue" isRequired mb={2}>
          <FormLabel>Номинальная стоимость</FormLabel>
          <Input placeholder="Номинальная стоимость" name='faceValue' type={'number'}/>
        </FormControl>

        {/*stock*/}
        <FormControl id="stock" isRequired mb={2}>
          <FormLabel>Простые акции</FormLabel>
          <Input placeholder="Простые акции" name='stock' type={'number'}/>
        </FormControl>

        {/*preference*/}
        <FormControl id="preference" isRequired mb={2}>
          <FormLabel>Привелегированные акции</FormLabel>
          <Input placeholder="Привелегированные акции" name='preference' type={'number'}/>
        </FormControl>

        {/*dividends*/}
        <FormControl id="dividends" isRequired mb={2}>
          <FormLabel>Дивиденды</FormLabel>
          <Input placeholder="Дивиденды" name='dividends' type={'number'}/>
        </FormControl>

        {/*Ebit*/}
        <FormControl id="Ebit" isRequired mb={2}>
          <FormLabel>Ebit</FormLabel>
          <Input placeholder="Ebit" name='Ebit' type={'number'}/>
        </FormControl>
        {/*liquidityIndicator*/}

        <FormControl as="fieldset">
          <FormLabel as="legend">Индикатор ликвидности</FormLabel>
          <RadioGroup name={'liquidityIndicator'} defaultValue="normal">
            <HStack spacing="24px">
              <Radio value="small">Слабый</Radio>
              <Radio value="normal">Средний</Radio>
              <Radio value="big">Высокий</Radio>
            </HStack>
          </RadioGroup>
        </FormControl>
      </Flex>


    </>
  )
};
