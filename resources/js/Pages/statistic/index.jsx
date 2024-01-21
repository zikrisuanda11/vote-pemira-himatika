import React from "react";
import VoteLayout from "../../layouts/vote";
import { FaEnvelopeOpenText } from "react-icons/fa6";
import LineChart from "./components/line";
import DoughnutChart from "./components/doughnut";
import MiniCard from "../../components/card/MiniCard";

export default function index({ auth, dataCandidate, totalVote, dataCandidateSatu, dataCandidateDua, dataCandidateTiga }) {
  return (
    <VoteLayout auth={auth}>
      <div className="flex flex-col gap-10 w-full mt-10">
        <div className="flex flex-wrap justify-center gap-5">
          {/* cards */}
          <MiniCard
            icon={<FaEnvelopeOpenText size={24} className="text-primary" />}
            title="Total Suara"
            value={totalVote}
          />
          {dataCandidate.original.map((data, idx) => (
            <MiniCard
              key={idx}
              icon={<FaEnvelopeOpenText size={24} className="text-primary" />}
              title={`Total Suara Paslon ${data.id_candidate}`}
              value={data.total_suara}
            />
          ))}
        </div>
        <div className="flex gap-5 justify-center">
          <div className="rounded-xl bg-white p-5 space-y-5 h-fit w-4/12 shadow-md">
            <h1 className="font-bold text-center">Data Perolahan Suara</h1>
            <DoughnutChart dataCandidate={dataCandidate} />
          </div>
          <div className="rounded-xl bg-white p-5 space-y-5 h-fit w-7/12 shadow-md">
            <h1 className="font-bold text-center">Data Perolahan Suara</h1>
            <LineChart dataCandidateSatu={dataCandidateSatu} dataCandidateDua={dataCandidateDua} dataCandidateTiga={dataCandidateTiga} />
          </div>
        </div>
      </div>
    </VoteLayout>
  )
}