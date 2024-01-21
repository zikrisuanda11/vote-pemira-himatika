import React from "react";
import {
  Chart as ChartJS,
  ArcElement,
  Tooltip,
  Legend,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
}
from "chart.js";
import { Line } from "react-chartjs-2";

export default function LineChart({ dataCandidateSatu, dataCandidateDua, dataCandidateTiga }) {
  ChartJS.register(ArcElement, Tooltip, Legend, CategoryScale, LinearScale, PointElement, LineElement,);
  const dateLabels = [
    "2024-01-19",
    "2024-01-20",
    "2024-01-21",
    "2024-01-22"
  ]

  const data = {
    labels: formattedData(dataCandidateSatu.original, dateLabels).map((data) => data.date),
    datasets: [
      {
        label: 'Paslon 1',
        data: formattedData(dataCandidateSatu.original, dateLabels).map((data) => data.total_suara),
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
      },
      {
        label: 'Paslon 2',
        data: formattedData(dataCandidateDua.original, dateLabels).map((data) => data.total_suara),
        borderColor: 'rgb(54, 162, 235)',
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
      },
      {
        label: 'Paslon 3',
        data: formattedData(dataCandidateTiga.original, dateLabels).map((data) => data.total_suara),
        borderColor: 'rgb(255, 205, 86)',
        backgroundColor: 'rgba(255, 205, 86, 0.5)',
      },
    ]
  }

  // options juga pastikan lagi
  const options = {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Chart.js Line Chart',
      },
    },
  };

  return (
    <Line data={data} options={options} />
  )
}

const formattedData = (dataCandidate, dateLabels) => {
  return dateLabels.map((dataLabel) => {
    const matchingData = dataCandidate.find((data) => data.tanggal === dataLabel);
    // console.log(matchingData);
    // ambil data terakhir dari tanggal sebelumnya
    return {
      date: dataLabel,
      total_suara: matchingData ? matchingData.total_suara : 0
    };
  });
};