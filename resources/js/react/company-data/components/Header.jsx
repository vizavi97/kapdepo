import React from 'react'

export const Header = () => {
  return (
    <nav className="market-nav">
      <ul>
        <li><a className="active"><span>Общее</span></a></li>
        <li><a className=""><span>Инфо</span></a></li>

        <li><a><span>Баланс</span></a></li>
        <li><a><span>Финансовый отчёт</span></a></li>
        <li><a data-toggle="modal" data-target="#request-call1" href="#"><span>
            <i className="fa fa-lock" aria-hidden="true"></i>
          </span>
          <span>Аналитика</span></a></li>


      </ul>
    </nav>
  )
};
