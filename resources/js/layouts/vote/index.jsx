import React from "react";
import { Avatar, Menu, MenuList, MenuItem, MenuButton } from '@chakra-ui/react'
import { router } from "@inertiajs/react"
import Sidebar from "./components/sidebar";

export default function VoteLayout({ children, auth }) {
  const handleLogout = () => {
    router.post('/logout')
  }
  return (
    <div className="">
      <nav className="flex justify-between items-center py-2 px-16 sticky top-0 bg-white/30 backdrop-blur-md my-2 z-10">
        <img src="/assets/logo.png" alt="" className="h-14 w-1h-14" />
        {auth && (
          <div>
            <div className="hidden lg:flex lg:gap-10 lg:items-center">
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
            <Sidebar auth={auth}/>
          </div>
        ) || (
            <div>
              <div className="hidden lg:flex lg:gap-10 lg:items-center">
                <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/">Vote</a>
                <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/statistics">Statistik</a>
                <a className="font-bold text-slate-500 hover:text-slate-700 transition-colors" href="/login">Login</a>
              </div>
              <Sidebar/>
            </div>
          )}
      </nav>
      <main className="flex px-8 lg:px-24 h-max">{children}</main>
      <footer></footer>
    </div>
  );
}