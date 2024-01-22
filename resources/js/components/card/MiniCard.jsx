import React from "react";

export default function MiniCard({ icon, title, value }) {
  return (
    <div className="rounded-xl bg-white p-5 h-fit flex gap-2 items-center w-full lg:w-60 shadow-md">
      <div className="bg-secondary rounded-full h-12 w-12 flex items-center justify-center">
        {icon}
      </div>
      <div className="flex flex-col">
        <h1 className="text-slate-500 font-bold text-sm">{title}</h1>
        <p className="font-bold text-lg">{value}</p>
      </div>
    </div>
  )
}