import React, {useState, useEffect} from 'react'
import {Flex} from '@chakra-ui/react'
import {All} from "./components/tabs/All";
import {FinanceIndicators} from "./components/tabs/FInanceIndicators";
import {getLastPathFromURL} from "../utils/utils";
import {Info} from "./components/tabs/Info";
import {Balance} from "./components/tabs/Balance";

export const CompanyDataContainer = () => {
  const [tab, setTab] = useState('all');
  const path = getLastPathFromURL();
  const [data, setData] = useState(null);
  useEffect(() => {
    axios.get(`http://kapdepo.cv05345.tmweb.ru/api/${path}`)
      .then(resp => {
        setData(resp.data);
      })
      .catch(err => console.log(err))
  }, []);
  return (
    <>
      <div className='row'>
        <div className='col-md-12'>
          <nav className="market-nav">
            <ul>
              <li><a className={tab === "all" ? "active" : null} onClick={() => setTab("all")}><span>Общее</span></a>
              </li>
              <li><a className={tab === "info" ? "active" : null}
                     onClick={() => setTab("info")}><span>Профиль</span></a>
              </li>
              <li><a className={tab === "indicators" ? "active" : null} onClick={() => setTab("indicators")}><span>Финансовые показатели</span></a>
              </li>
              <li><a className={tab === "balance" ? "active" : null}
                     onClick={() => setTab("balance")}><span>Баланс</span></a></li>
              <li><a className={tab === "report" ? "active" : null}
                     onClick={() => setTab("report")}><span>Финансовый отчёт</span></a></li>
              <li><a data-toggle="modal" data-target="#request-call1" href="#"><span>
            <i className="fa fa-lock" aria-hidden="true"></i>
          </span>
                <span>Аналитика</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div className='row'>
        <div className='col-md-12'>
          {tab === "all" ? <All data={data}/> : null}
          {tab === "info" ? <Info data={data}/> : null}
          {tab === "indicators" ? <FinanceIndicators data={data}/> : null}
          {tab === "balance" ? <Balance balance={data.balance}/> : null}
        </div>
      </div>
    </>
  )
};
