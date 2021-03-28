import React from 'react'
import {Flex} from '@chakra-ui/react'

export const Analytics = props => {
  const data = props.data;
  return (
    <Flex className='container' flexDirection='column'>
      {data.length > 0 ?
        <div className="accordion trade-steps" id="accordionExample">
          {data.map((item, key) => {
            return (
              <div className="trade-step" key={key}>
                <div className="trade-step-headline collapsed" id={"heading-" + item.id} data-toggle="collapse"
                     data-target={"#collapse-" + item.id}
                     aria-expanded="true" aria-controls={"collapse-" + item.id}>
                  <span></span>
                  <h4>{item.title}</h4>
                </div>
                <div id={"collapse-" + item.id} className="trade-step-body collapse"
                     aria-labelledby={"heading-" + item.id}
                     data-parent="#accordionExample">
                  <div className="trade-step-body-inner">
                    <div dangerouslySetInnerHTML={{__html: item.desc}}></div>
                    <div className='d-flex justify-content-between'>
                      <td><a target="_blank" href={"/storage/" + item.image}>
                        <span><i class="fas fa-file-pdf"></i></span> Файл</a></td>
                      <h6>{item.updated_at}</h6>
                    </div>
                  </div>
                </div>
              </div>
            )
          })}
        </div> : null}

    </Flex>
  )
};
