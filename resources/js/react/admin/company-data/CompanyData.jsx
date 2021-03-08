import React from 'react'
import ReactDOM from 'react-dom';


export const CompanyData = () => {
  console.log('qwe');
  return (
    <>
      <p>company data</p>
    </>
  )
};




if (document.getElementById('admin-companies-information')) {
  ReactDOM.render(<CompanyData/>, document.getElementById('admin-companies-information'))
}