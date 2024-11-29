const express = require("express");
const nodemailer = require("nodemailer");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
const PORT = 3000;

// Middleware
app.use(bodyParser.json());
app.use(cors());

// Configurer Nodemailer
const transporter = nodemailer.createTransport({
    service: "gmail",
    auth: {
        user: "studiopeinturefigurine@gmail.com", // Remplacez par votre adresse Gmail
        pass: "IndianaNES42@!",  // Remplacez par votre mot de passe d'application
    },
});

// Route pour envoyer un email
app.post("/send-email", (req, res) => {
    const { subject, message } = req.body;

    const mailOptions = {
        from: "votre_adresse@gmail.com",
        to: "studiopeinturefigurine@gmail.com",
        subject: subject,
        text: message,
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.error(error);
            res.status(500).send("Erreur lors de l'envoi de l'email.");
        } else {
            console.log("Email envoyé : " + info.response);
            res.status(200).send("Email envoyé avec succès !");
        }
    });
});

// Lancer le serveur
app.listen(PORT, () => {
    console.log(`Serveur lancé sur http://localhost:${PORT}`);
});
