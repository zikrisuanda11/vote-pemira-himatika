import React, { useEffect } from "react";
import GoogleBotton from "../../components/button/Google";
import { useToast } from '@chakra-ui/react'


export default function SignIn({ success }) {
  const toast = useToast();

  useEffect(() => {
    if (success != null) {
      toast({
        title: success,
        variant: 'left-accent',
        status: 'success',
        isClosable: true,
        position: 'top',
      })
    }
  }, [success])

  return (
    <div className="flex justify-center items-center h-svh">
      <div className="flex flex-col justify-center items-center gap-10">
        {/* ilustration */}
        <img src="/assets/techny-receiving-a-letter-or-email.gif" alt="" className="h-96 " draggable="false" />
        {/* form */}
        <div className="flex flex-col justify-center gap-10">
          <div className="flex flex-col justify-center gap-2">
            <h1 className="font-sans text-4xl font-bold text-slate-700">Sign In</h1>
            <p className="text-sm text-slate-400">Sign-in menggunakan akun Universitas Mulia!</p>
          </div>
          <GoogleBotton />
        </div>
      </div>
    </div>
  );
}
