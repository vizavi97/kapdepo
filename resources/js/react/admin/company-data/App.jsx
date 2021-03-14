import React, {useState} from 'react'
import {Flex, Button} from '@chakra-ui/react'
import {Box, Heading, Spacer} from "@chakra-ui/layout";
import {ListData} from "./components/ListData";
import {CreateElement} from "./components/CreateElement";


export const App = () => {

  const [button, setButton] = useState('list');

  const changeRootStateHandler = newValue => setButton(newValue);

  return (
    <>
      <Flex>
        <Box p="2">
          <Heading
            size="md">
            {button === "list" ? "Список информации компаний" : null}
            {button === "create" ? "Создать информацию о  компании" : null}
          </Heading>
        </Box>
        <Spacer/>
        <Box>
          <Button colorScheme="teal" mr="4"
                  isActive={button === "list"}
                  onClick={() => setButton('list')}>
            Список
          </Button>
          <Button colorScheme="teal"
                  isActive={button === "create"}
                  onClick={() => setButton('create')}>Создать</Button>
        </Box>
      </Flex>
      <Flex>
        {button === "list" ? <ListData/> : null}
        {button === "create" ? <CreateElement onChange={changeRootStateHandler}/> : null}
      </Flex>

    </>
  )
};
