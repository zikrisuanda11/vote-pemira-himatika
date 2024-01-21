import React, { useEffect } from "react";
import ModalVote from "./components/modal";
import VoteLayout from "../../layouts/vote";
import DrawerVote from "./components/drawer";
import { useToast } from '@chakra-ui/react'
import { router } from "@inertiajs/react";

export default function VotePage({ auth, candidates, error, success }) {

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
    if (error != null) {
      toast({
        title: error,
        variant: 'left-accent',
        status: 'warning',
        isClosable: true,
        position: 'top',
      })
    }
    router.reload()
  }, [success, error])

  return (
    <VoteLayout auth={auth}>
      <div className="flex flex-col items-center gap-10 w-full mt-10">
        <header className="flex flex-col items-center gap-2">
          <h1 className="font-bold text-3xl">Vote Calon ketua Himatika</h1>
          <p className="text-center text-sm text-slate-500">Pemilihan dapat dilakukan dari tanggal <br /> 24 Januari 2024 s/d 26 Januari 2024.</p>
        </header>
        <main className="flex gap-10">
          {candidates.map((candidate, idx) => (
            <div key={idx} className="flex flex-col items-center gap-2 bg-white rounded-xl px-5 py-5 shadow-md">
              <img src={candidate.candidate_image} alt="" className="h-80 rounded-xl" draggable="false" />
              <div className="space-x-3">
                {auth && (
                  <ModalVote candidate={candidate} />
                )}
                <DrawerVote candidate={candidate} />
              </div>
            </div>
          ))}
        </main>
      </div>
    </VoteLayout>
  )
}