import React from 'react';
import { Bar } from 'react-chartjs-2';
import { Chart as ChartJS, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(BarElement, CategoryScale, LinearScale);

const Dashboard = () => {
  const data = {
    labels: ['Jan', 'Feb', 'Mar'],
    datasets: [
      {
        label: 'Usuários',
        data: [10, 20, 30],
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
      },
    ],
  };

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Dashboard</h1>
      <Bar data={data} />
    </div>
  );
};

export default Dashboard;
