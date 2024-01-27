import React, { useEffect } from "react";
// import ModalVote from "./components/modal";
import VoteLayout from "../../layouts/vote";
// import DrawerVote from "./components/drawer";
import { useToast } from '@chakra-ui/react'
import { router } from "@inertiajs/react";
import CardCandidate from "./components/cardCandidate";

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
      <div className="flex flex-col items-center gap-10 w-full mt-10 mb-24">
        <header className="flex flex-col items-center gap-2">
          <h1 className="text-center font-bold text-3xl">Vote Calon ketua Himatika</h1>
          <p className="text-center text-sm text-slate-500">Pemilihan dapat dilakukan dari tanggal <br /> 24 Januari 2024 s/d 28 Januari 2024.</p>
        </header>
        <main className=" flex gap-10 flex-wrap lg:flex-nowrap items-center justify-center">
          {candidates.map((candidate, idx) => (
            <CardCandidate key={idx} candidate_image={candidate.candidate_image} auth={auth} candidate={candidate}/>
          ))}
        </main>
      </div>
    </VoteLayout>
  )
}