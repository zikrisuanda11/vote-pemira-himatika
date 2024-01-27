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

export default function LineChart({ dataCandidateSatu, dataCandidateDua }) {
  ChartJS.register(ArcElement, Tooltip, Legend, CategoryScale, LinearScale, PointElement, LineElement,);
  const dateLabels = [
    "2024-01-23",
    "2024-01-24",
    "2024-01-25",
    "2024-01-26",
    "2024-01-27",
    "2024-01-28",
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
    ]
  }

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
  
    return {
      date: dataLabel,
      total_suara: matchingData ? matchingData.total_suara : 0
    };
  });
};