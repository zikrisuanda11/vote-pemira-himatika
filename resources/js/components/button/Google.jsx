import React from "react";

export default function GoogleBotton(){

  return (
    <a target="_top" href="/auth/google" className="bg-secondary text-black rounded-xl py-2">
      <div className="flex justify-center items-center">
        <div className="mr-2">
          <img src="/assets/google.svg" alt="google" className="w-6"/>
        </div>
        <div className="text-xs">
          Sign In with Google
        </div>
      </div>
    </a>
  )
}