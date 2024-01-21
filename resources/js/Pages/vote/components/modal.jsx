import {
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalFooter,
  ModalBody,
  ModalCloseButton,
  useDisclosure,
} from '@chakra-ui/react'
import FillButton from '../../../components/button/Fill'
import React from 'react'
import OutlineButton from '../../../components/button/Outline'
import { router } from '@inertiajs/react';

export default function ModalVote({candidate}) {
  const { isOpen, onOpen, onClose } = useDisclosure()

  const handleOnVote = (id_candidate) => {
    router.post('/vote', {
      id_candidate: id_candidate
    })
    onClose()
  }

  return (
    <>
      <FillButton name="Vote" onClick={onOpen}/>

      <Modal isOpen={isOpen} onClose={onClose} isCentered>
        <ModalOverlay />
        <ModalContent>
          <ModalHeader>Konfirmasi Vote</ModalHeader>
          <ModalCloseButton />
          <ModalBody>
            <p>Proses voting hanya dapat dilakukan sekali pastikan pilihan anda benar!</p>
          </ModalBody>
          <ModalFooter className='space-x-3'>
            <FillButton name="Vote" onClick={() => handleOnVote(candidate.id)}/>
            <OutlineButton name="Close" onClick={onClose}/>
          </ModalFooter>
        </ModalContent>
      </Modal>
    </>
  )
}