import React from "react";

export default function AuthLayout({ children }) {
  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-100">
      <div className="flex flex-col items-center justify-center w-full max-w-sm px-6 py-4 bg-white shadow-md rounded-md">
        {children}
        p for pantek
      </div>
    </div>
  );
}