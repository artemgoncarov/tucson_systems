import { VprikolAPI } from 'vprikol-ts';

// Create an instance of the API
const api = new VprikolAPI({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjY0YzU0MjU1MmZkOTdjMzMyMzY1MzhhZCIsIm1ldGhvZHMiOlsibWVtYmVycyIsImZpbmQiXSwiYW50aWZsb29kX2J5cGFzcyI6ZmFsc2UsImFkbWluX2FjY2VzcyI6ZmFsc2UsImV4cCI6MjQ0NzUxMzUwN30.ETE2v8MeuRGpKbwDhSLAEt36lPAp5UcuxQKuq4eZXXY' });

// Get a list of players in the fraction with ID 1 on the server with ID 1
api.members(1, 1).then(data => {
    // If the request was successful
    if (data.success === true) {
        // Print the list of players
        console.log(`
            List of players in the fraction '${data.data.fractionLabel}' on the server '${data.data.server}':
            ${Object.entries(data.data.players).map(([username, player]) => `${username} - ${player.rankLabel}`).join('\n')}
        `);
    } else {
        // Print the error message
        console.error(data.error.message);
    }
});