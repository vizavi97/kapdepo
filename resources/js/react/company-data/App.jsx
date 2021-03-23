import React from 'react'
import ReactDOM from 'react-dom';
import {CompanyDataContainer} from "./CompanyDataContainer";

import {ChakraProvider} from '@chakra-ui/react'


export const CompanyData = () => {

  return (
    <>
      <ChakraProvider>
        <CompanyDataContainer/>
      </ChakraProvider>
    </>
  )
};


if (document.getElementById('company-data')) {
  ReactDOM.render(<CompanyData/>, document.getElementById('company-data'))
}