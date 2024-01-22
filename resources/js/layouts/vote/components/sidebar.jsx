import React from "react";
import { RxHamburgerMenu } from "react-icons/rx";
import {
  Drawer,
  DrawerBody,
  DrawerFooter,
  DrawerHeader,
  DrawerOverlay,
  DrawerContent,
  DrawerCloseButton,
  useDisclosure,
  Button,
} from '@chakra-ui/react'
import { Avatar, Menu, MenuList, MenuItem, MenuButton } from '@chakra-ui/react'
import { router } from "@inertiajs/react"

export default function Sidebar({ auth }) {
  const handleLogout = () => {
    router.post('/logout')
  }
  const { isOpen, onOpen, onClose } = useDisclosure()
  const btnRef = React.useRef()

  return (
    <div className="lg:hidden">
      <RxHamburgerMenu onClick={onOpen} size={24} />
      <Drawer
        isOpen={isOpen}
        placement='right'
        onClose={onClose}
        finalFocusRef={btnRef}
        size='xs'
      >
        <DrawerOverlay />
        <DrawerContent>
          <DrawerHeader className="flex gap-2 items-center">
            {auth && (
              <Avatar src={auth.picture} alt="avatar" />
            )}
            Pemira
          </DrawerHeader>

          <DrawerBody>
            {auth && (
              <div className="flex gap-2 flex-col">
                <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/">Vote</a>
                <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/statistics">Statistik</a>
                <p className="font-bold text-slate-500 hover:text-slate-700 transition-colors" onClick={handleLogout}>Logout</p>
              </div>
            ) || (
                <div className="flex flex-col gap-2">
                  <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/">Vote</a>
                  <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/statistics">Statistik</a>
                  <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/login">Login</a>
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
    </div>
  )
}