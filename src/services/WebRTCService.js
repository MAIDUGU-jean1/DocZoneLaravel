class WebRTCService {
  constructor() {
    this.peerConnection = null;
    this.localStream = null;
    this.remoteStream = null;
    this.configuration = {
      iceServers: [
        {
          urls: [
            'stun:stun1.l.google.com:19302',
            'stun:stun2.l.google.com:19302',
          ],
        },
      ],
    };
  }

  async initializeCall(isVideo = true) {
    try {
      const constraints = {
        audio: true,
        video: isVideo,
      };

      this.localStream = await navigator.mediaDevices.getUserMedia(constraints);
      this.peerConnection = new RTCPeerConnection(this.configuration);

      this.localStream.getTracks().forEach((track) => {
        this.peerConnection.addTrack(track, this.localStream);
      });

      this.peerConnection.ontrack = (event) => {
        this.remoteStream = event.streams[0];
      };

      return this.localStream;
    } catch (error) {
      console.error('Error initializing call:', error);
      throw error;
    }
  }

  async createOffer() {
    try {
      const offer = await this.peerConnection.createOffer();
      await this.peerConnection.setLocalDescription(offer);
      return offer;
    } catch (error) {
      console.error('Error creating offer:', error);
      throw error;
    }
  }

  async handleAnswer(answer) {
    try {
      const remoteDesc = new RTCSessionDescription(answer);
      await this.peerConnection.setRemoteDescription(remoteDesc);
    } catch (error) {
      console.error('Error handling answer:', error);
      throw error;
    }
  }

  async handleCandidate(candidate) {
    try {
      await this.peerConnection.addIceCandidate(new RTCIceCandidate(candidate));
    } catch (error) {
      console.error('Error handling ICE candidate:', error);
      throw error;
    }
  }

  endCall() {
    if (this.localStream) {
      this.localStream.getTracks().forEach((track) => track.stop());
    }
    if (this.peerConnection) {
      this.peerConnection.close();
    }
    this.localStream = null;
    this.remoteStream = null;
    this.peerConnection = null;
  }
}

export default new WebRTCService(); 