import React from 'react'


export const Info = props => {
  const keys = props.data.keys;
  const info = props.data.info.info;
  console.log(props.data);
  console.log(info);
  return (
    <div className='row w-100'>
      <div className="col-md-6">
        <div className="profile-info">
          <p>{info.address ? info.address : 'none translation'}</p>
          <p>{info.phone ? info.phone : 'none translation'}</p>
          <p><a href={info.site ? info.site : '#'} target="_blank">
            {info.site ? info.site : 'none translation'}</a>
          </p>

        </div>
      </div>
      <div className="col-md-6">
        <ul className="profile-category">
          <li>Сектор <span>{info.sector ? info.sector : 'none translation'}</span>
          </li>
          <li>Промышленность <span>{info.industry ? info.industry : 'none'}</span>
          </li>
        </ul>
      </div>
      <div className="col-md-12">
        <h3 className="profile-title">Руководители</h3>
        <div className="profile-table-block">

          <table className="profile-table">
            <thead>
            <tr>
              <th>Имя</th>
              <th>Должность</th>
            </tr>
            </thead>
            <tbody>
            {keys ? keys.map((item, key) => {
              return (
                <tr key={key}>
                  <td>{item.name}</td>
                  <td>{item.position}</td>
                </tr>
              )
            }) : null}
            </tbody>
          </table>
        </div>
      </div>
      <div className="col-md-12">
        <h3 className="profile-title">Описание</h3>
        <div className="profile-desc-block">
          {info.desc ? <p dangerouslySetInnerHTML={{__html: info.desc}}/> : "none translation"}

        </div>
      </div>

    </div>
  )
};
