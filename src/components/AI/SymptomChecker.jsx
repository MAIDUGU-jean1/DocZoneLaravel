import React, { useState } from 'react';
import { AiOutlineSearch } from 'react-icons/ai';

const commonSymptoms = [
  'Headache',
  'Fever',
  'Cough',
  'Fatigue',
  'Chest Pain',
  'Shortness of Breath',
  'Nausea',
  'Back Pain',
  'Joint Pain',
  'Anxiety',
];

const SymptomChecker = ({ onDoctorRecommendation }) => {
  const [selectedSymptoms, setSelectedSymptoms] = useState([]);
  const [searchTerm, setSearchTerm] = useState('');
  const [analyzing, setAnalyzing] = useState(false);

  const handleSymptomSelect = (symptom) => {
    if (!selectedSymptoms.includes(symptom)) {
      setSelectedSymptoms([...selectedSymptoms, symptom]);
    }
  };

  const handleSymptomRemove = (symptom) => {
    setSelectedSymptoms(selectedSymptoms.filter((s) => s !== symptom));
  };

  const analyzeSymptoms = async () => {
    setAnalyzing(true);
    try {
      // Here we would typically make an API call to a backend service
      // that uses ML/AI to analyze symptoms and recommend specialists
      const mockAnalysis = await new Promise((resolve) => {
        setTimeout(() => {
          resolve({
            recommendedSpecialty: 'General Practitioner',
            confidence: 0.85,
            alternativeSpecialties: ['Internal Medicine', 'Family Medicine'],
            urgencyLevel: 'Medium',
            explanation: 'Based on your symptoms, we recommend consulting a General Practitioner first for a comprehensive evaluation.',
          });
        }, 1500);
      });

      onDoctorRecommendation(mockAnalysis);
    } catch (error) {
      console.error('Error analyzing symptoms:', error);
    } finally {
      setAnalyzing(false);
    }
  };

  return (
    <div className="bg-white rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
      <h2 className="text-2xl font-bold mb-6 text-gray-800">AI Symptom Checker</h2>
      
      {/* Symptom Search */}
      <div className="relative mb-6">
        <AiOutlineSearch className="absolute left-3 top-3 text-gray-400" size={20} />
        <input
          type="text"
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
          placeholder="Search for symptoms..."
          className="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      {/* Common Symptoms */}
      <div className="mb-6">
        <h3 className="text-lg font-semibold mb-3 text-gray-700">Common Symptoms</h3>
        <div className="flex flex-wrap gap-2">
          {commonSymptoms
            .filter((symptom) =>
              symptom.toLowerCase().includes(searchTerm.toLowerCase())
            )
            .map((symptom) => (
              <button
                key={symptom}
                onClick={() => handleSymptomSelect(symptom)}
                className={`px-3 py-1 rounded-full text-sm ${
                  selectedSymptoms.includes(symptom)
                    ? 'bg-blue-500 text-white'
                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                }`}
              >
                {symptom}
              </button>
            ))}
        </div>
      </div>

      {/* Selected Symptoms */}
      {selectedSymptoms.length > 0 && (
        <div className="mb-6">
          <h3 className="text-lg font-semibold mb-3 text-gray-700">Selected Symptoms</h3>
          <div className="flex flex-wrap gap-2">
            {selectedSymptoms.map((symptom) => (
              <div
                key={symptom}
                className="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm flex items-center"
              >
                {symptom}
                <button
                  onClick={() => handleSymptomRemove(symptom)}
                  className="ml-2 text-blue-600 hover:text-blue-800"
                >
                  ×
                </button>
              </div>
            ))}
          </div>
        </div>
      )}

      {/* Analyze Button */}
      <button
        onClick={analyzeSymptoms}
        disabled={selectedSymptoms.length === 0 || analyzing}
        className={`w-full py-3 rounded-lg text-white font-semibold ${
          selectedSymptoms.length === 0 || analyzing
            ? 'bg-gray-400 cursor-not-allowed'
            : 'bg-blue-500 hover:bg-blue-600'
        }`}
      >
        {analyzing ? (
          <span className="flex items-center justify-center">
            <svg
              className="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                className="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                strokeWidth="4"
              ></circle>
              <path
                className="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              ></path>
            </svg>
            Analyzing Symptoms...
          </span>
        ) : (
          'Analyze Symptoms'
        )}
      </button>
    </div>
  );
};

export default SymptomChecker; 