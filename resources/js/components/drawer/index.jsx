import {
  Drawer,
  DrawerBody,
  DrawerFooter,
  DrawerHeader,
  DrawerOverlay,
  DrawerContent,
  DrawerCloseButton,
  Button
} from '@chakra-ui/react'
import React from 'react'

export default function DrawerExamplee({ isOpen, onClose, btnRef, candidate }) {
  console.log(candidate);

  return (
    <>
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
                  <p className='italic text-slate-500'>{candidate.vision}</p>
                  <p>{candidate.mission}</p>
                  <p className='font-bold'>Nomor Urut <br/> {candidate.id}</p>
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