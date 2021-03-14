import React, {useState, useEffect} from 'react';
import {FormControl, Input, FormLabel, Flex, Button, HStack, Radio, RadioGroup, Select} from '@chakra-ui/react'

export const UpdateElement = (props) => {
  const [loader, setLoader] = useState(false);
  useEffect(() => {
    axios.get('http://kapdepo.cv05345.tmweb.ru/admin/api/company-data')
      .then(resp => setCompanies(resp.data))
  }, []);
  const [companies, setCompanies] = useState(null);
  const [form, setForm] = useState({
    id: props.object.id || "",
    companyID: props.object.company_id || '',
    year: props.object.year || '',
    quarter: props.object.quarter || '',
    unallocatedProfits: props.object.unallocatedProfits || '',
    commitments: props.object.commitments || '',
    longLine: props.object.longLine || '',
    shortLine: props.object.shortLine || '',
    proceeds: props.object.proceeds || '',
    profit: props.object.profit || '',
    moneyResources: props.object.moneyResources || '',
    activesOnStart: props.object.activesOnStart || '',
    activesOnEnd: props.object.activesOnEnd || '',
    capitalOnStart: props.object.capitalOnStart || '',
    capitalOnEnd: props.object.capitalOnEnd || '',
    faceValue: props.object.faceValue || '',
    stock: props.object.stock || '',
    preference: props.object.preference || '',
    dividends: props.object.dividends || '',
    ebit: props.object.ebit || '',
    liquidityIndicator: props.object.liquidityIndicator || '',
  });
  const submitHandler = async event => {
    event.preventDefault();
    setLoader(true);
    await axios.post('http://kapdepo.cv05345.tmweb.ru/admin/api/company-data/update', form, {
      headers: {
        'X-CSRF-TOKEN': localStorage.getItem('csrf')
      }
    })
      .then(resp => {
        setLoader(false);
        window.location.reload();
      })
      .then(err => console.log(err))

  };
  const inputHandler = event => {
    const {name, value} = event.target;
    setForm(prevState => ({
      ...prevState,
      [name]: value,
    }))
  };

  return (
    <form style={{width: "100%", position: "relative"}} onSubmit={submitHandler}>
      <Flex flexDirection={"column"} w={"100%"} my={4} px={4}>
        <Flex mb={4}>
          <Select placeholder='Выберете год' mx={2}
                  onChange={inputHandler}
                  name='year'
                  value={form.year}
          >
            {new Array(50).fill('').map((item, key) => {
              return (
                <option key={key + 1990} value={key + 1990}>{key + 1990}</option>
              )
            })}
          </Select>
          <Select placeholder='Выберете квартал' mx={2}
                  onChange={inputHandler}
                  name='quarter'
                  value={form.quarter}
          >
            <option value="1">1 квартал</option>
            <option value="2">2 квартал</option>
            <option value="3">3 квартал</option>
            <option value="4">4 квартал</option>
          </Select>
        </Flex>
        {companies ? <Select placeholder="Выберите компанию"
                             onChange={inputHandler}
                             name='companyID'
                             value={form.companyID}
        >
          {companies.map((item, key) => {
            return <option key={key} value={item.id}>{item.title}</option>
          })}
        </Select> : null}
        <FormControl id="unallocatedProfits" isRequired mb={2}>
          <FormLabel>Нераспределенная прибыль</FormLabel>
          <Input placeholder="Нераспределенная прибыль"
                 onChange={inputHandler}
                 isDisabled={loader}

                 name="unallocatedProfits"
                 value={form.unallocatedProfits}
                 type={'number'}/>
        </FormControl>
        <FormControl id="commitments" isRequired mb={2}>
          <FormLabel>Обязательства</FormLabel>
          <Input placeholder="Обязательства"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='commitments'
                 value={form.commitments}
                 type={'number'}/>
        </FormControl>
        <FormControl id="longLine" isRequired mb={2}>
          <FormLabel>Долгосрочные</FormLabel>
          <Input placeholder="Долгосрочные"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='longLine'
                 value={form.longLine}
                 type={'number'}/>
        </FormControl>
        <FormControl id="shortLine" isRequired mb={2}>
          <FormLabel>Кратко-срочные</FormLabel>
          <Input placeholder="Кратко-срочные"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='shortLine'
                 value={form.shortLine}
                 type={'number'}/>
        </FormControl>
        <FormControl id="proceeds" isRequired mb={2}>
          <FormLabel>Выручка</FormLabel>
          <Input placeholder="Выручка"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='proceeds'
                 value={form.proceeds}
                 type={'number'}/>
        </FormControl>
        <FormControl id="profit" isRequired mb={2}>
          <FormLabel>Чистая</FormLabel>
          <Input placeholder="прибыль"

                 isDisabled={loader}
                 onChange={inputHandler}
                 name='profit'
                 value={form.profit}
                 type={'number'}/>
        </FormControl>
        <FormControl id="moneyResources" isRequired mb={2}>
          <FormLabel>Денежные средства</FormLabel>
          <Input placeholder="Денежные средства"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='moneyResources'
                 value={form.moneyResources}
                 type={'number'}/>
        </FormControl>
        {/*activesOnStart*/}
        <FormControl id="activesOnStart" isRequired mb={2}>
          <FormLabel>Активы на начало отчетного периода</FormLabel>
          <Input placeholder="Активы на начало отчетного периода"

                 isDisabled={loader}
                 onChange={inputHandler}
                 name='activesOnStart'
                 value={form.activesOnStart}
                 type={'number'}/>
        </FormControl>
        {/*activesOnEnd*/}
        <FormControl id="activesOnEnd" isRequired mb={2}>
          <FormLabel>Активы на начало отчетного периода</FormLabel>
          <Input placeholder="Активы на конец отчетного периода"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='activesOnEnd'
                 value={form.activesOnEnd}
                 type={'number'}/>
        </FormControl>

        {/*capitalOnStart*/}
        <FormControl id="capitalOnStart" isRequired mb={2}>
          <FormLabel>Собственный капитал на начало отчетнного периода</FormLabel>
          <Input placeholder="Собственный капитал на начало отчетнного периода"
                 onChange={inputHandler}
                 name='capitalOnStart'

                 isDisabled={loader}
                 value={form.capitalOnStart}
                 type={'number'}/>
        </FormControl>

        {/*capitalOnEnd*/}
        <FormControl id="capitalOnEnd" isRequired mb={2}>
          <FormLabel>Собственный капитал на конец отчетнного периода</FormLabel>
          <Input placeholder="Собственный капитал на конец отчетнного периода"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='capitalOnEnd'
                 value={form.capitalOnEnd}
                 type={'number'}/>
        </FormControl>


        {/*faceValue*/}
        <FormControl id="faceValue" isRequired mb={2}>
          <FormLabel>Номинальная стоимость</FormLabel>
          <Input placeholder="Номинальная стоимость"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='faceValue'
                 value={form.faceValue}
                 type={'number'}/>
        </FormControl>

        {/*stock*/}
        <FormControl id="stock" isRequired mb={2}>
          <FormLabel>Простые акции</FormLabel>
          <Input placeholder="Простые акции"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='stock'
                 value={form.stock}
                 type={'number'}/>
        </FormControl>

        {/*preference*/}
        <FormControl id="preference" isRequired mb={2}>
          <FormLabel>Привелегированные акции</FormLabel>
          <Input placeholder="Привелегированные акции"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='preference'
                 value={form.preference}
                 type={'number'}/>
        </FormControl>

        {/*dividends*/}
        <FormControl id="dividends" isRequired mb={2}>
          <FormLabel>Дивиденды</FormLabel>
          <Input placeholder="Дивиденды"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='dividends'
                 value={form.dividends}
                 type={'number'}/>
        </FormControl>

        {/*Ebit*/}
        <FormControl id="ebit" isRequired mb={2}>
          <FormLabel>Ebit</FormLabel>
          <Input placeholder="ebit"
                 onChange={inputHandler}

                 isDisabled={loader}
                 name='ebit'
                 value={form.ebit}
                 type={'number'}/>
        </FormControl>
        {/*liquidityIndicator*/}

        <FormControl as="fieldset">
          <FormLabel as="legend">Индикатор ликвидности</FormLabel>
          <Select placeholder='Индикатор ликвидности' mx={2}
                  onChange={inputHandler}
                  name='liquidityIndicator'
                  value={form.liquidityIndicator}
          >
            <option value="small">Слабый</option>
            <option value="normal">Средний</option>
            <option value="big">Высокий</option>
          </Select>
        </FormControl>
        <Flex justifyContent={"flex-end"}>
          <Button type={"submit"} colorScheme={"teal"}
                  isLoading={loader}

          >Изменить</Button>
        </Flex>
      </Flex>
    </form>
  )
};
