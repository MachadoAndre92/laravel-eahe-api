import React, { useEffect, useState } from 'react';
import axios from 'axios';
import classNames from 'classnames';

const TemperatureSensorData = () => {
  const [sensorData, setSensorData] = useState([]);

  useEffect(() => {
    axios
      .get('http://13.53.73.223/api/leituras')
      .then(response => {
        console.log('Sensor Data:', response.data);
        setSensorData(response.data);
      })
      .catch(error => {
        console.error(error);
      });
  }, []);

  const getTemperatureChangeClass = (previousTemp, currentTemp) => {
    if (currentTemp > previousTemp) {
      return 'text-green-500';
    } else if (currentTemp < previousTemp) {
      return 'text-red-500';
    }
    return '';
  };

  return (
    <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      {sensorData.map(item => (
        <div key={item.id} className="bg-white rounded-lg shadow p-4">
          <h2 className="text-xl font-semibold">{item.zona.name}</h2>
          <p className={classNames('text-gray-600', getTemperatureChangeClass(item.previousTemp, item.temp))}>
            Temperature: {item.temp}
          </p>
          <p className="text-gray-600">Humidity: {item.hum}</p>
        </div>
      ))}
    </div>
  );
};

export default TemperatureSensorData;