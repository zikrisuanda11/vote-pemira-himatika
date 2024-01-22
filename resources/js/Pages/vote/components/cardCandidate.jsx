import React from "react";
import ModalVote from "./modal";
import DrawerVote from "./drawer";

export default function CardCandidate({ candidate_image, auth, candidate}) {
  return (
    <div className="flex flex-col items-center gap-2 bg-white rounded-xl px-5 py-5 shadow-md">
      <img src={candidate_image} alt="" className="h-80 rounded-xl" draggable="false" />
      <div className="space-x-3">
        {auth && (
          <ModalVote candidate={candidate} />
        )}
        <DrawerVote candidate={candidate} />
      </div>
    </div>
  )
}