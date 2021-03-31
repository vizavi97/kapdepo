import React, {useState, useEffect} from 'react';
import {
  Table,
  Thead,
  Tbody,
  Tr,
  Th,
  Td,
  Flex, Button,
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalFooter,
  ModalBody,
  ModalCloseButton,
} from "@chakra-ui/react"
import {useDisclosure} from "@chakra-ui/hooks";
import {UpdateElement} from "./UpdateElement";
import {config} from '../../../utils/config';

export const ListData = () => {
  console.log(window.location.origin);
  const [companies, setCompanies] = useState([]);
  const [selectedCompany, setSelectedCompany] = useState({});
  const {isOpen, onOpen, onClose} = useDisclosure();
  useEffect(() => {
    axios.get(`${config.ADMIN_API_URL}company-data/list`)
      .then(resp => setCompanies(resp.data))
  }, []);

  const deleteHandler = id => {
    axios.post(`${config.ADMIN_API_URL}company-data/delete`, {id})
      .then(response => {
        setCompanies(companyArr => companyArr.filter(item => item.id !== id))
      })
      .catch(error => console.log(error))
  };

  return (
    <>
      <Table variant="simple" mt={4} colorScheme="teal" size={"sm"}>
        <Thead>
          <Tr>
            <Th>ID</Th>
            <Th>Комания</Th>
            <Th>Год</Th>
            <Th>Квартал</Th>
            <Th> последние изменнения</Th>
            <Th>Действия</Th>
          </Tr>
        </Thead>
        <Tbody>
          {companies.length > 0 ? companies.map((item, key) => {
            return (
              <Tr key={key}>
                <Td>{item.id}</Td>
                <Td>{item.company_name}</Td>
                <Td>{item.year}</Td>
                <Td>{item.quarter}</Td>
                <Td>{item.updated_at}</Td>
                <Td>
                  <Flex>
                    <Button size='sm' colorScheme='yellow' onClick={() => {
                      onOpen();
                      setSelectedCompany(item)
                    }} mr={2}>Изменить</Button>
                    <Button size='sm' colorScheme='red' onClick={() => deleteHandler(item.id)}>Удалить</Button>
                  </Flex>
                </Td>
              </Tr>
            )
          }) : null}
        </Tbody>


      </Table>

      <Modal isOpen={isOpen} onClose={onClose}>
        <ModalOverlay/>
        <ModalContent>
          <ModalHeader>Modal Title</ModalHeader>
          <ModalCloseButton/>
          <ModalBody>
            <UpdateElement object={selectedCompany}/>
          </ModalBody>
        </ModalContent>
      </Modal>
    </>
  )
};
