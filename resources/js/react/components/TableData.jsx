import React, {useState, useEffect} from 'react'
import axios from 'axios'
import Highcharts from 'highcharts'
import HighchartsReact from "highcharts-react-official";
import {config} from "../utils/config";

export const TableData = () => {
  const [dataArr, setDataArr] = useState([]);
  const [filteredArr, setFilteredArr] = useState([]);
  const [showInUsd, setShowInUsd] = useState(false);
  const [dataLoader, setDataLoader] = useState(true);
  const [sortDown, setSortDown] = useState(true);
  useEffect(() => {
    axios.get(`${config.API_URL}market-data`)
      .then(response => {
        setDataArr(response.data);
        setFilteredArr(response.data);
        setDataLoader(false);
      })
      .catch(error => console.log("error: ", error))
  }, []);
  const inputChangeHandler = event => {
    const lowerCase = event.target.value.toLowerCase().trim();
    setFilteredArr(dataArr.filter(item => Object.keys(item).some(key => item[key].toString().toLowerCase().includes(lowerCase))))
  };
  const sort = (objectKey) => {
    const arr = [...filteredArr];
    if (sortDown) {
      arr.sort((a, b) => a[objectKey] - b[objectKey])
    } else {
      arr.sort((a, b) => b[objectKey] - a[objectKey])
    }
    setFilteredArr(arr);
    setSortDown(!sortDown);
  };
  if (dataLoader) {
    return (
      <div className='d-flex justify-content-center align-content-center py-4'>
        <div className="spinner-grow" style={{width: "4rem", height: '4rem'}} role="status">
          <span className="sr-only">Loading...</span>
        </div>
      </div>
    )
  }
  return (
    <div className='row'>
      <div className='market-header w-100 d-flex justify-content-between align-content-center mb-3'>
        <div className='mr-2'>
          <button className="btn btn-warning" style={{minWidth: "120px"}} onClick={() => setShowInUsd(prev => !prev)}>
            <strong>
              {showInUsd ? "В USD" : "В Суммах"}
            </strong>
          </button>
        </div>
        <div className='market-header'>
          <button type='button'
                  className='btn btn-dark mr-1'
                  onClick={() => setFilteredArr(dataArr)}>Все
          </button>
          <button type='button'
                  className='btn btn-dark mr-1'
                  onClick={() => setFilteredArr(dataArr.filter(item => item.data.status === "shares"))}>Акции
          </button>
          <button type='button'
                  className='btn btn-dark mr-1'
                  onClick={() => setFilteredArr(dataArr.filter(item => item.data.status === "bonds"))}>Облигации
          </button>
        </div>
        <div className="input-group col-lg-4">
          <input type="text"
                 className="form-control"
                 placeholder="Поиск по тикеру"
                 onChange={inputChangeHandler}
          />
        </div>
      </div>
      <table className="market-table">
        <thead>
        <tr>
          <th>Тикер</th>
          <th>Компания</th>
          <th>Последняя</th>
          <th>Изменение</th>
          <th>Изменение</th>
          <th>
            <button type='button' className='btn btn-sm text-white'
                    onClick={() => sort("volume")}
            >Объём &#8597;</button>
          </th>

          <th>
            <button type='button' className='btn btn-sm text-white'
                    onClick={() => sort("market_cap")}>Рыночная
              кап &#8597;
            </button>
          </th>

          <th>График за месяц</th>

        </tr>
        </thead>
        <tbody>
        {filteredArr.map((item, key) => {
          const color = () => {
            if (item.change_1 > 0) {
              return {color: "#39b839"}
            }
            if (item.change_1 < 0) {
              return {color: "#ff0017"}
            }
            return {color: "#222"}
          };
          const volume = item.volume ? item.volume : '-';
          const chart = item.data.month_volume;
          const chartArr = chart.slice(0, 30);
          const options = {
            chart: {
              type: 'area',
              height: 50,
              margin: [5, 0, 5, 0]
            },
            tooltip: {enabled: false},
            credits: {enabled: false},
            title: {
              style: {display: 'none'}
            },

            xAxis: {
              labels: {enabled: false},
              gridLineWidth: 0,
            },
            yAxis: {
              title: {text: false},
              gridLineWidth: 0,
              labels: {enabled: false},
            },

            legend: {enabled: false},

            series: [
              {
                data: chartArr.map((item) => item.last_price),
                color: color().color
              }
            ]
          };
          return (
            <tr key={key}>
              <td><a href={item.link}>{item.data.issuer}</a></td>
              <td>{item.data.title}</td>
              <td>{item.data.last_price ? item.data.last_price : "-"}</td>
              <td><span style={color()}>{item.change_1.toLocaleString()}</span></td>
              <td><span style={color()}>% {Number(item.change_2).toLocaleString()}</span></td>
              <td>{volume.toLocaleString()}</td>
              <td>{showInUsd ? item.market_cap_USD.toLocaleString() + " $" : item.market_cap.toLocaleString()}</td>
              <td style={{width: 150}}>
                {chart.length > 0 ?
                  <HighchartsReact style={{display: "flex", justifyContent: "flex-end"}}
                                   highcharts={Highcharts}
                                   options={options}/>
                  : 'нет записей'
                }
              </td>
            </tr>

          )
        })}
        </tbody>
      </table>
    </div>
  )
};
