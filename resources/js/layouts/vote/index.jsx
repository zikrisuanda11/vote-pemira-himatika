import React from "react";
import { Avatar, Menu, MenuList, MenuItem, MenuButton } from '@chakra-ui/react'
import { Link, router } from "@inertiajs/react"

export default function VoteLayout({ children, auth }) {
  const handleLogout = () => {
    router.post('/logout')
  }

  return (
    <div className="bg-secondary">
      <nav className="flex justify-between items-center py-2 px-16 sticky top-0 bg-white/30 rounded-xl backdrop-blur-md my-2 z-10">
        <img src="/assets/logo.png" alt="" className="h-14 w-1h-14" />
        {auth && (
          <div className="flex gap-10 items-center">
            <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/">Vote</a>
            <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/statistics">Statistik</a>
            <Menu>
              <MenuButton as="button">
                <Avatar name={auth.name} src={auth.picture} size='md' />
              </MenuButton>
              <MenuList>
                <MenuItem as='button' onClick={handleLogout}>
                  Log out
                </MenuItem>
              </MenuList>
            </Menu>
          </div>
        ) || (
            <div className="flex gap-10 items-center">
              <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/">Vote</a>
              <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/statistics">Statistik</a>
              <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/login">Login</a>
            </div>
          )}
      </nav>
      <main className="flex px-24 h-screen">{children}</main>
      {/* <div className="h-screen"></div> */}
      <footer></footer>
    </div>
  );
}