import React, { useState, useRef, useEffect } from 'react';
import { IoMdVideocam, IoMdCall, IoMdImage, IoMdSend } from 'react-icons/io';
import { AiOutlineRobot } from 'react-icons/ai';

const ChatInterface = ({ doctorId, userId }) => {
  const [messages, setMessages] = useState([]);
  const [newMessage, setNewMessage] = useState('');
  const [isVideoCallActive, setIsVideoCallActive] = useState(false);
  const [isVoiceCallActive, setIsVoiceCallActive] = useState(false);
  
  const localVideoRef = useRef();
  const remoteVideoRef = useRef();
  
  const handleSendMessage = () => {
    if (!newMessage.trim()) return;
    
    const message = {
      id: Date.now(),
      sender: userId,
      content: newMessage,
      timestamp: new Date().toISOString(),
      type: 'text'
    };
    
    setMessages(prev => [...prev, message]);
    setNewMessage('');
  };

  const handleImageUpload = (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (event) => {
      const message = {
        id: Date.now(),
        sender: userId,
        content: event.target.result,
        timestamp: new Date().toISOString(),
        type: 'image'
      };
      setMessages(prev => [...prev, message]);
    };
    reader.readAsDataURL(file);
  };

  const startVideoCall = () => {
    setIsVideoCallActive(true);
    // WebRTC implementation will go here
  };

  const startVoiceCall = () => {
    setIsVoiceCallActive(true);
    // WebRTC implementation will go here
  };

  return (
    <div className="flex flex-col h-screen bg-gray-100">
      {/* Header */}
      <div className="bg-white shadow-md p-4 flex items-center justify-between">
        <div className="flex items-center space-x-4">
          <img src={doctorProfilePic} alt="Doctor" className="w-12 h-12 rounded-full" />
          <div>
            <h2 className="text-xl font-semibold">Dr. {doctorName}</h2>
            <p className="text-sm text-gray-500">{doctorSpecialty}</p>
          </div>
        </div>
        <div className="flex space-x-4">
          <button
            onClick={startVideoCall}
            className="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600"
          >
            <IoMdVideocam size={24} />
          </button>
          <button
            onClick={startVoiceCall}
            className="p-2 rounded-full bg-green-500 text-white hover:bg-green-600"
          >
            <IoMdCall size={24} />
          </button>
          <button
            onClick={() => setShowAIHelper(true)}
            className="p-2 rounded-full bg-purple-500 text-white hover:bg-purple-600"
          >
            <AiOutlineRobot size={24} />
          </button>
        </div>
      </div>

      {/* Video Call Container */}
      {isVideoCallActive && (
        <div className="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50">
          <div className="relative w-full max-w-4xl">
            <video ref={remoteVideoRef} className="w-full" autoPlay playsInline />
            <video
              ref={localVideoRef}
              className="absolute bottom-4 right-4 w-48 rounded-lg"
              autoPlay
              playsInline
              muted
            />
          </div>
        </div>
      )}

      {/* Chat Messages */}
      <div className="flex-1 overflow-y-auto p-4 space-y-4">
        {messages.map((message) => (
          <div
            key={message.id}
            className={`flex ${
              message.sender === userId ? 'justify-end' : 'justify-start'
            }`}
          >
            <div
              className={`max-w-[70%] rounded-lg p-3 ${
                message.sender === userId
                  ? 'bg-blue-500 text-white'
                  : 'bg-white text-gray-800'
              }`}
            >
              {message.type === 'text' ? (
                <p>{message.content}</p>
              ) : (
                <img
                  src={message.content}
                  alt="Shared"
                  className="max-w-full rounded"
                />
              )}
              <p className="text-xs mt-1 opacity-75">
                {new Date(message.timestamp).toLocaleTimeString()}
              </p>
            </div>
          </div>
        ))}
      </div>

      {/* Message Input */}
      <div className="bg-white p-4 border-t">
        <div className="flex items-center space-x-4">
          <label className="cursor-pointer">
            <input
              type="file"
              accept="image/*"
              className="hidden"
              onChange={handleImageUpload}
            />
            <IoMdImage size={24} className="text-gray-500 hover:text-blue-500" />
          </label>
          <input
            type="text"
            value={newMessage}
            onChange={(e) => setNewMessage(e.target.value)}
            placeholder="Type your message..."
            className="flex-1 border rounded-full px-4 py-2 focus:outline-none focus:border-blue-500"
            onKeyPress={(e) => e.key === 'Enter' && handleSendMessage()}
          />
          <button
            onClick={handleSendMessage}
            className="p-2 rounded-full bg-blue-500 text-white hover:bg-blue-600"
          >
            <IoMdSend size={20} />
          </button>
        </div>
      </div>
    </div>
  );
};

export default ChatInterface; 