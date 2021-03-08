import React from 'react';
import ReactDOM from 'react-dom';
import {TableData} from "./components/TableData";
import '@devexpress/dx-react-chart-bootstrap4/dist/dx-react-chart-bootstrap4.css';



export const RootComponent = () => {
  return (
    <div className='d-flex flex-column w-100'>
      <div className='container'>
        <TableData/>
      </div>
    </div>
  )
};

if (document.getElementById('market-data')) {
  ReactDOM.render(<RootComponent/>, document.getElementById('market-data'))
}