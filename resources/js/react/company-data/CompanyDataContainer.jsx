import React, {useState, useEffect} from 'react'
import {Flex, Spinner} from '@chakra-ui/react'
import {All} from "./components/tabs/All";
import {FinanceIndicators} from "./components/tabs/FInanceIndicators";
import {getLastPathFromURL} from "../utils/utils";
import {Info} from "./components/tabs/Info";
import {Balance} from "./components/tabs/Balance";
import {FinanceReport} from "./components/tabs/FinanceReport";

import {lang as LangJSON} from '../utils/getLang'
import {Analytics} from "./components/tabs/Analytics";
import {config} from "../utils/config";

export const CompanyDataContainer = () => {
  const [lang, setLang] = useState('ru');
  const [tab, setTab] = useState('all');
  const [disabled, setDisabled] = useState(true);
  const [data, setData] = useState(null);
  const path = getLastPathFromURL();
  const words = LangJSON[lang];
  useEffect(() => {
    axios.get(`${config.API_URL}${path}`)
      .then(resp => {
        setData(resp.data);
        setLang(resp.data.lang);
        setDisabled(false);
      })
      .catch(err => console.log(err))
  }, []);
  if (disabled) {
    return (
      <Flex justifyContent='center' alignItems='center' w='100%' my='4rem'>
        <Spinner
          thickness="4px"
          speed="0.65s"
          emptyColor="gray.200"
          color="blue.500"
          size="xl"
        />
      </Flex>
    )

  }
  return (
    <>
      <div className='row'>
        <div className='col-md-12'>
          <nav className="market-nav">
            <ul>
              <li><a className={tab === "all" ? "active" : null} onClick={() => setTab("all")}><span>{words.all}</span></a>
              </li>
              {data.info.info ? <li><a className={tab === "info" ? "active" : null}
                                       onClick={() => setTab("info")}><span>{words.profile}</span></a>
              </li> : null}
              <li><a className={tab === "indicators" ? "active" : null} onClick={() => setTab("indicators")}>
                <span>{words.financeIndicator}</span></a>
              </li>
              <li><a className={tab === "balance" ? "active" : null}
                     onClick={() => setTab("balance")}><span>{words.balance}</span></a></li>
              <li><a className={tab === "report" ? "active" : null}
                     onClick={() => setTab("report")}><span>{words.financialReport}</span></a></li>
              {data.analysis.length > 0 ?
                <li>
                  {data.user ?
                    <a className={tab === "analytics" ? "active" : null}
                       onClick={() => setTab("analytics")}><span>{words.analytics}</span></a>
                    : <a data-toggle="modal" data-target="#request-call1" href="#"><span>
                    <i className="fa fa-lock" aria-hidden="true"></i></span><span>{words.analytics}</span>
                    </a>}
                </li>
                : null}
            </ul>
          </nav>
        </div>
      </div>
      <div className='row my-4'>
        <div className='col-md-12'>
          {tab === "all" ? <All data={data} lang={words}/> : null}
          {tab === "info" ? <Info data={data} lang={words}/> : null}
          {tab === "indicators" ?
            <FinanceIndicators quarters={data.quarters} lang={words} dividends={data.div}/> : null}
          {tab === "report" ? <FinanceReport balance={data.finance} lang={words}/> : null}
          {tab === "balance" ? <Balance balance={data.balance} lang={words}/> : null}
          {tab === "analytics" ? <Analytics data={data.analysis} lang={words}/> : null}
        </div>
      </div>
    </>
  )
};
