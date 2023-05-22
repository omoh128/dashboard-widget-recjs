import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend } from 'recharts';

const DashboardWidget = () => {
  const [data, setData] = useState([]);
  const [selectedOption, setSelectedOption] = useState('7');

  useEffect(() => {
    fetchData();
  }, []);

  const fetchData = () => {
    const days = parseInt(selectedOption);
    const url = `/wp-json/my-plugin/v1/data?days=${days}`;

    fetch(url)
      .then((response) => response.json())
      .then((jsonData) => setData(jsonData));
  };

  const handleOptionChange = (e) => {
    setSelectedOption(e.target.value);
  };

  useEffect(() => {
    fetchData();
  }, [selectedOption]);

  return (
    <div>
      <select value={selectedOption} onChange={handleOptionChange}>
        <option value="7">Last 7 days</option>
        <option value="15">Last 15 days</option>
        <option value="30">Last 1 month</option>
      </select>

      <LineChart width={500} height={300} data={data}>
        <CartesianGrid strokeDasharray="3 3" />
        <XAxis dataKey="date" />
        <YAxis />
        <Tooltip />
        <Legend />
        <Line type="monotone" dataKey="value" stroke="#8884d8" />
      </LineChart>
    </div>
  );
};  

export default DashboardWidget