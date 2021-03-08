import React from 'react'
import ReactDOM from 'react-dom';
import {App} from "./App";

import {ChakraProvider} from '@chakra-ui/react'

export const CompanyData = () => {

  return (
    <>
      <ChakraProvider>
        <App/>
      </ChakraProvider>
    </>
  )
};


if (document.getElementById('admin-companies-information')) {
  ReactDOM.render(<CompanyData/>, document.getElementById('admin-companies-information'))
}