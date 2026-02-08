import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return (
        <div style={{ textAlign: 'center', marginTop: '50px' }}>
            <h1>Ahoj! Toto je React uvnitř Laravelu! 🚀</h1>
            <p>Data načteme z API...</p>
        </div>
    );
}

// Najde element s ID "app" v HTML a "vstříkne" do něj React
if (document.getElementById('app')) {
    const root = ReactDOM.createRoot(document.getElementById('app'));
    root.render(<App />);
}