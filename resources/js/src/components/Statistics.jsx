import React from 'react'
import React, { useEffect, useState } from 'react';
import { Line } from 'react-chartjs-2';
import axios from 'axios';
import Chart from 'chart.js/auto';
import { format } from 'date-fns';

const LineChart = () => {
  const [chartData, setChartData] = useState(null);

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = () => {
    axios
      .get('http://localhost:8000/api/leituras')
      .then(response => {
        console.log('Sensor Data:', response.data);
        const sensorData = response.data;
        const formattedData = formatData(sensorData);
        setChartData(formattedData);
      })
      .catch(error => {
        console.error(error);
      });
  };

  const formatData = sensorData => {
    const datasets = {};

    sensorData.forEach(item => {
      const { zona_id, created_at, temp } = item;

      if (!datasets[zona_id]) {
        datasets[zona_id] = {
          label: `Zona ${zona_id}`,
          data: [],
        };
      }

      datasets[zona_id].data.push({
        x: created_at,
        y: parseFloat(temp),
      });
    });

    return {
      datasets: Object.values(datasets),
    };
  };

  const options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        type: 'time',
        time: {
          tooltipFormat: 'PP',
          parser: 'iso',
          unit: 'day',
          displayFormats: {
            day: 'MMM D',
          },
        },
      },
      y: {
        title: {
          display: true,
          text: 'Temperature',
        },
      },
    },
  };

  // Register date-fns adapter
  Chart.register(format);

  return (
    <div>
      {chartData ? (
        <Line data={chartData} options={options} />
      ) : (
        <p>Loading chart data...</p>
      )}
    </div>
  );
};

export default LineChart;
