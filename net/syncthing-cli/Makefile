# Created by: Steve Wills <swills@FreeBSD.org>
# $FreeBSD$

PORTNAME=	syncthing-cli
PORTVERSION=	0.1.0.2015070301
PORTREVISION=	2
CATEGORIES=	net

MAINTAINER=	swills@FreeBSD.org
COMMENT=	Syncthing CLI

BUILD_DEPENDS=	go14>=1.4:${PORTSDIR}/lang/go14

USE_GITHUB=	yes
GH_ACCOUNT=	syncthing AudriusButkevicius:audrius
GH_PROJECT=	syncthing:st cli:audrius
GH_TAGNAME=	2707f77 v${SYNCTHING_VER}:st 7f561c7:audrius

SYNCTHING_VER=	0.11.18

PLIST_FILES=	bin/syncthing-cli

STRIP=		# stripping can break go binaries

post-patch:
	@${MKDIR} ${WRKSRC}/src/github.com/syncthing
	@${MKDIR} ${WRKSRC}/src/github.com/AudriusButkevicius
	@${MKDIR} ${WRKSRC}/src/code.google.com/p
	@${MKDIR} ${WRKSRC}/src/golang.org/x
	@${MKDIR} ${WRKSRC}/src/github.com/bkaradzic
	@${MV} ${WRKSRC_audrius} \
		${WRKSRC}/src/github.com/AudriusButkevicius/cli
	@${MV} ${WRKSRC_st}/Godeps/_workspace/src/golang.org/x/crypto \
		${WRKSRC}/src/golang.org/x
	@${MV} ${WRKSRC_st}/Godeps/_workspace/src/golang.org/x/text \
		${WRKSRC}/src/golang.org/x
	@${MV} ${WRKSRC_st}/Godeps/_workspace/src/github.com/bkaradzic/go-lz4 \
		${WRKSRC}/src/github.com/bkaradzic
	@${MV} ${WRKSRC_st}/Godeps/_workspace/src/github.com/calmh \
		${WRKSRC}/src/github.com/calmh
	@${MV} ${WRKSRC_st} \
		${WRKSRC}/src/github.com/syncthing/syncthing
	@${MV} ${WRKSRC}/src/github.com/syncthing/syncthing/Godeps/_workspace/src/github.com/syncthing/protocol \
		${WRKSRC}/src/github.com/syncthing/protocol

do-build:
	@cd ${WRKSRC} ; ${SETENV} PATH=${PATH}:${LOCALBASE}/go14/bin \
		GOPATH=${WRKSRC} go build
	@${MV} ${WRKSRC}/syncthing-cli-${GH_TAGNAME} ${WRKSRC}/syncthing-cli

do-install:
	${INSTALL_PROGRAM} ${WRKSRC}/syncthing-cli ${STAGEDIR}${PREFIX}/bin/

.include <bsd.port.mk>
