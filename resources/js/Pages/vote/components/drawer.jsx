import {
  Drawer,
  DrawerBody,
  DrawerFooter,
  DrawerHeader,
  DrawerOverlay,
  DrawerContent,
  DrawerCloseButton,
  Button,
  useDisclosure
} from '@chakra-ui/react'
import React from 'react'
import { Divider } from '@chakra-ui/react';
import OutlineButton from '../../../components/button/Outline';

export default function DrawerVote({ candidate }) {
  const { isOpen, onOpen, onClose } = useDisclosure()
  const btnRef = React.useRef()

  return (
    <>
      <OutlineButton name="Detail" onClick={onOpen} />
      <Drawer
        size="lg"
        isOpen={isOpen}
        placement='right'
        onClose={onClose}
        finalFocusRef={btnRef}
      >
        <DrawerOverlay />
        <DrawerContent>
          <DrawerCloseButton />
          <DrawerHeader>Detail Informasi Kandidat</DrawerHeader>
          <DrawerBody>
            {candidate && (
              <div className='flex flex-col items-center gap-5'>
                <img src={candidate.candidate_image} alt="" className='h-80' />
                <div className='flex flex-col gap-2 items-center text-center w-8/12'>
                  <h3 className='font-bold text-xl'>{candidate.name}</h3>
                  <Divider />
                  <p className='font-bold'>Visi</p>
                  <p className='italic text-slate-500'>{candidate.vision}</p>
                  <p className='font-bold'>Misi</p>
                  <ul className='text-start list-decimal'>
                    {candidate.mission.split('\n').map((line, index) => (
                      <li key={index}>{line}</li>
                    ))}
                  </ul>
                  <Divider />
                </div>
              </div>
            )}
          </DrawerBody>

          <DrawerFooter>
            <Button variant='outline' mr={3} onClick={onClose}>
              Cancel
            </Button>
          </DrawerFooter>
        </DrawerContent>
      </Drawer>
    </>
  )
}