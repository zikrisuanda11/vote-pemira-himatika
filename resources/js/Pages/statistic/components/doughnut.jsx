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
import { Doughnut } from "react-chartjs-2";

export default function DoughnutChart({ dataCandidate }) {

  ChartJS.register(ArcElement, Tooltip, Legend, CategoryScale, LinearScale, PointElement, LineElement,);

  const dataDougnut = {
    labels: dataCandidate.original.map((candidate) => candidate.id_candidate),
    datasets: [{
      label: 'Total Suara',
      data: dataCandidate.original.map((candidate) => candidate.persentase_suara),
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 10
    }]
  }
  
  const optionsDoughnut = {
    plugins: {
      tooltip: {
        callbacks: {
          label: function (context) {
            const label = context.dataset.label || '';
            const value = context.formattedValue;
            return label + ': ' + value + '%';
          }
        }
      }
    }
  };

  return (
    <Doughnut data={dataDougnut} options={optionsDoughnut} />
  )
}